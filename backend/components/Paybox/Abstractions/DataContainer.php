<?php
namespace backend\components\Paybox\Abstractions;

abstract class DataContainer {

    private $xml;
   // public $redirectUrl;

    protected $classes = [
        'config',
        'customer',
        'merchant',
        'order',
        'payment',
        'payout'
    ];

    public function __get($property) {
        throw new \backend\components\Paybox\Exceptions\Data('Property ' . $property . ' not found');
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __debugInfo() {
        $properties = get_object_vars($this);
        if(get_called_class() == 'backend\components\Paybox\Merchant') {
            $patterns = [
                '~[a-zA-Z]~',
                '~[0-9]~'
            ];
            $replace = [
                'l',
                'd'
            ];
            $properties['secretKey'] = preg_replace($patterns, $replace, $properties['secretKey']);
            $properties['id'] = preg_replace($patterns, $replace, $properties['id']);
        }
        unset(
            $properties['classes'],
            $properties['xml']
        );
        return $properties;
    }

    public function __call($method, $args) {
        $type = mb_substr($method, 0, 3);
        $property = lcfirst(mb_substr($method, 3));
        if($type == 'get') {
            if(property_exists($this, $property)) {
                return $this->$property;
            } else {
                throw new \backend\components\Paybox\Exceptions\Data('Property "' . $property .  '" not found');
            }
        } elseif($type == 'set') {
            if((!empty($args[0])) &&
               (!is_array($args[0]))) {
                $this->$property = $args[0];
            }
        } else {
            throw new \backend\components\Paybox\Exceptions\Data('Method ' . $method . ' not found');
        }
    }

    protected function buildRequest($object) {
        $class = get_class($object);
        $params = get_class_vars($class);
        $properties = get_object_vars($object);
        if(empty($this->xml)) {
            $this->initXML('request');
        }
        foreach($properties as $property => $value) {
            if(
                (!empty($value)) &&
                ($property !== 'classes') &&
                ($property !== 'xml') &&
                ($property !== 'secretKey')) {
                $this->xml->addChild($this->getRealName($params, $class, $property), htmlspecialchars($value));
            }
        }
    }

    protected function buildResponse(array $data, $secretKey) {
        $this->initXML('response');
        foreach($data as $key => $val) {
            $this->xml->addChild($key, $val);
        }
        $this->signRequest($secretKey);
        return $this->xml->asXML();
    }
/*
    protected function run($script) {
        if(get_called_class() == 'backend\components\Paybox\Payment') {
            $request['pg_xml'] = $this->xml->asXML();
            $dom = new \DOMDocument();
            if($curl = curl_init()) {
                $this->prepareRequest($curl, $script, $request);
                $dom->loadHTML(curl_exec($curl));
                curl_close($curl);
                if($link = $dom->getElementsByTagName('a')->item(0)) {
                    header('Location:/'.$link->getAttribute('href'));
                }
            }
        } elseif(get_called_class() == 'backend\components\Paybox\Payout') {
            $request = (array) $this->xml;
            if($curl = curl_init()) {
                $this->prepareRequest($curl, $script, $request);
                $xml = new \SimpleXMLElement(curl_exec($curl));
                curl_close($curl);
                if($xml->xpath('//pg_redirect_url')) {
                    header('Location:/'.$xml->xpath('//pg_redirect_url')[0]);
                }
            }
        }
    }

	
	*/
	
	
	   protected function run($script) {
        if(get_called_class() == 'backend\components\Paybox\Payment') {
            $request['pg_xml'] = $this->xml->asXML();
            $dom = new \DOMDocument();
            if($curl = curl_init()) {
                $this->prepareRequest($curl, $script, $request);
                
				//$dom->loadHTML(curl_exec($curl));
				$curl_result = curl_exec($curl);
				$dom->loadHTML($curl_result);
                curl_close($curl);
                if($link = $dom->getElementsByTagName('a')->item(0)) {
						
						
						$this->redirectUrl = $link->nodeValue;
						
					return;	
					
                }
            }
        } elseif(get_called_class() == 'backend\components\Paybox\Payout') {
            $request = (array) $this->xml;
            if($curl = curl_init()) {
                $this->prepareRequest($curl, $script, $request);
                $xml = new \SimpleXMLElement(curl_exec($curl));
                curl_close($curl);
                if($xml->xpath('//pg_redirect_url')) {
                    //header('Location:/'.$xml->xpath('//pg_redirect_url')[0]);
					
					return $xml->xpath('//pg_redirect_url')[0];	
				   // header('Location:/'.$link->getAttribute('href'));
					
					
					
                }
            }
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    private function prepareRequest($curl, $script, $data) {
        curl_setopt($curl, CURLOPT_URL, 'https://api.paybox.money/'.$script);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }

    protected function signRequest($key, $url = null) {
        $data = (array) $this->xml;
        $data['pg_salt'] = $this->getSalt(64);
        $this->xml->addChild('pg_salt', $data['pg_salt']);
        $this->xml->addChild('pg_sig', $this->generateSign($data, $key, $url));
    }

    protected function generateSign(array $data, $key, $url = null) {
        ksort($data);
        $url = (is_null($url))
                ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                : $url;
        $url = explode('/', $url);
        array_unshift($data, end($url));
        array_push($data, $key);
        return md5(implode(';', $data));
    }

    private function initXML($type) {
        $this->xml = new \DOMDocument();
        $this->xml->preserveWhiteSpace = true;
        $this->xml->formatOutput = true;
        $this->xml->validationOnParse = false;
        $this->xml->appendChild($this->xml->createElement($type));
        $this->xml = new \SimpleXMLElement($this->xml->saveXML());
    }

    private function getRealName($properties, $class, $name) {
        if($name == 'id') {
            if($class == 'backend\components\Paybox\Merchant') {
                $name = 'pg_merchant_id';
            } elseif($class == 'backend\components\Paybox\Order') {
                $name = 'pg_order_id';
            }
        }
        if(($name == 'timeLimit') && ($class == 'backend\components\Paybox\Order')) {
            $name = 'pg_order_time_limit';
        }
        if(($name == 'cardIdTo') && ($class == 'backend\components\Paybox\Payout')) {
            $name = 'pg_card_id_to';
        }
        if(($name == 'ip') && ($class == 'backend\components\Paybox\Customer')) {
            $name = 'pg_user_ip';
        }
        $arr = array_map('strtolower', preg_split('/(?=[A-Z])/', $name));
        if(array_key_exists($name, $properties)) {
            if($arr[0] == 'is') {
                $arr[0] = 'pg';
            } else {
                array_unshift($arr, 'pg');
            }
        }
        return implode('_', $arr);
    }

    private function getSalt($size) {
        return bin2hex(random_bytes($size));
    }

    protected function process(\backend\components\Paybox\Paybox $paybox, $script, $url):array {
       foreach(get_object_vars($paybox) as $key => $value) {
            if(is_object($value)) {
                $this->buildRequest($value);
            }
        }
        $this->signRequest($paybox->merchant->secretKey, $script);
        return (array) $this->run($url);
    }
}

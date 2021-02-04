<?php
namespace backend\components\Paybox;

class Paybox extends Abstractions\DataContainer {

    public function __get($property) {
        if(!property_exists($this, $property)) {
            if(in_array($property, $this->classes)) {
                $class = 'backend\components\Paybox\\'.ucfirst($property);
                $this->$property = new $class();
            } else {
                return false;
            }
        }
        return $this->$property;
    }

    public function initPayment() {
        return $this->payment->init($this);
    }

    public function initPayout() {
        return $this->payout->init($this);
    }

    public function getCardList() {
        return $this->payout->getCardList($this);
    }

    public function removeCard() {
        return $this->payout->removeCard($this);
    }

    public function payout() {
        return $this->payout->payout($this);
    }

    public function getPaymentStatus($paymentId, $orderId) {
        return $this->payment->getPaymentStatus($paymentId);
    }

    public function getPayoutStatus() {
        return $this->payout->getPaymentStatus($this);
    }

    public function getBalanceStatus() {
        return $this->payout->getBalanceStatus($this);
    }

    public function parseRequest($str) {
        $str = urldecode($str);
        $str = preg_replace("/\\\\u([0-9a-f]{3,4})/i", "&#x\\1;", $str);
        $str = str_replace('\\','',str_replace('\n','',html_entity_decode($str, null, 'UTF-8')));
        $xml = new \DOMDocument();
        $xml->loadXML($str);
        $xml = new \SimpleXMLElement($xml->saveXML());
        $request = (array) $xml;
        if($this->checkRequestSign($request)) {
            unset($request['pg_sig'], $request['pg_salt']);
            return $request;
        } else {
            throw new \Exception('Incorrect signature. Maybe it is not Paybox' );
        }
    }

    public function checkRequestSign($request) {
        $requestSign = $request['pg_sig'];
        unset($request['pg_sig']);
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return ($requestSign == $this->generateSign($request, $this->merchant->secretKey, parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    }

}

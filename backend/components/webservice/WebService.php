<?php
namespace backend\components\webservice;
 
use backend\components\webservice\request\BaseRequest;
use backend\components\webservice\request\BaseRequest\Get_InfoClientIIN;
use backend\components\webservice\request\BaseRequest\GetPremiumOGPO;
use yii\base\Component;
use SoapClient;
use Yii;
 
class WebService extends Component
{
    public $wsdl = '';
    public $username = '';
    public $password = '';
    public $uri = '';
 
    /**
     * @var SoapClient
     */
    private $client;
 
    public function init()
    {
        $this->createSoapClient();
        parent::init();
    }
 
    public function send(BaseRequest $request)
    {
        $method = pathinfo(str_replace('\\', '/', get_class($request)), PATHINFO_BASENAME);
        return @call_user_func_array([$this->client, $method], [$request]);
    }
 
    protected function createSoapClient()
    {
        $wsdl = Yii::getAlias($this->wsdl);
        $this->client = new SoapClient($wsdl, [
            'uri' => $this->uri,
            'trace' => 1,
            'compression' => SOAP_COMPRESSION_ACCEPT,
            'login' => $this->username,
            'password' => $this->password,
            'exceptions' => 1,
            'soap_version' => SOAP_1_2,
            'cache_wsdl' =>  WSDL_CACHE_MEMORY,
        ]);
    }
}





?>

<?php 
//echo http_response($url,'400'); // returns true if http status is 400 


use yii\httpclient\Client;

$client = new Client([
    'formatters' => [
        'myformat' => 'app\components\http\MyFormatter', // добавить новый форматтер
        Client::FORMAT_XML => 'app\components\http\MyXMLFormatter', // переопределить форматтер XML, используемый по умолчанию
    ],
]);




$client = new Client();
$response = $client->createRequest()
    ->setMethod('GET')
    ->setUrl('http://webmaster.yandex.ru/sqi')
    ->setData(['host' => 'space-warriors.com'])
    ->send();
if ($response->isOk) {
    
//	echo $response->data['id'];
	echo $response->data;
}


?> 
<pre>Yandex IKS</pre>
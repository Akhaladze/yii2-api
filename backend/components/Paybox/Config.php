<?php
namespace backend\components\Paybox;

class Config extends Abstractions\DataContainer {

    public $currency;
    public $checkUrl;
    public $resultUrl;
    public $refundUrl;
    public $captureUrl;
    public $successUrl;
    public $failureUrl;
    public $postLink;
    public $backLink;
    public $requestMethod;
    public $successUrlMethod;
    public $failureUrlMethod;
    public $paymentSystem;
    public $lifetime;
    public $encoding;
    public $language;
    public $isTestingMode;
    public $isPostponePayment;
    
}

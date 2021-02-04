<?php
namespace backend\components\Paybox\Interfaces;

interface Payment {

    //public function init(\backend\components\Paybox $paybox):void;
	public function init(\backend\components\Paybox\Paybox $paybox);
	public function reject( $description);
    public function waiting($timeout);
    public function error($code,  $description);
    public function accept( $description);

}

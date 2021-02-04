<?php
namespace backend\components\Paybox;

final class Payment extends Abstractions\DataContainer implements Interfaces\Payment {

    public $isPostponePayment;
    public $isRecurringStart;
    public $recurringLifetime;
    public $redirectUrl;

    public function init(\backend\components\Paybox\Paybox $paybox) {
        $this->process(
            $paybox,
            'payment.php',
            'payment.php'
        );
    }

    public function waiting($timeout) {
        return $this->buildResponse([
                'pg_status' => 'ok',
                'pg_timeout' => $timeout
            ],
            $this->secretKey);
    }

    public function reject( $description) {
        return $this->buildResponse([
                'pg_status' => 'rejected',
                'pg_description' => $description
            ],
            $this->secretKey);
    }

    public function error( $code,  $descr) {
        return $this->buildResponse([
                'pg_status' => 'error',
                'pg_error_code' => $code,
                'pg_error_description' => $descr
            ],
            $this->secretKey);
    }

    public function accept( $descr) {
        return $this->buildResponse([
                'pg_status' => 'ok',
                'pg_description' => $descr
            ],
            $this->secretKey);
    }

}

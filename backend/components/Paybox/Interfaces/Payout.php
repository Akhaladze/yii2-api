<?php

namespace backend\components\Paybox\Interfaces;

interface Payout {
    public function init(\backend\components\Paybox $paybox);
    public function getCardList(\backend\components\Paybox $paybox);
    public function removeCard(\backend\components\Paybox $paybox);
    public function payout(\backend\components\Paybox $paybox);
    public function getPaymentStatus(\backend\components\Paybox $paybox);
    public function getBalanceStatus(\backend\components\Paybox $paybox);
}

<?php

namespace Paybox;

final class Payout extends Abstractions\DataContainer implements Interfaces\Payout {

    public $paymentId;
    public $cardIdTo;

    public function init($paybox) {
       $this->process(
            $paybox,
            'add',
            'v1/merchant/' . $paybox->merchant->id . '/cardstorage/add'
        );
    }

    public function getCardList($paybox) {
        return $this->process(
            $paybox,
            'list',
            'v1/merchant/' . $paybox->merchant->id . '/cardstorage/list'
        );
    }

    public function removeCard($paybox) {
        return $this->process(
            $paybox,
            'remove',
            'v1/merchant/' . $paybox->merchant->id . '/cardstorage/remove'
        );
    }

    public function payout($paybox) {
        return $this->process(
            $paybox,
            'reg2reg',
            'api/reg2reg'
        );
    }

    public function getPaymentStatus($paybox) {
        return $this->process(
            $paybox,
            'payment_status',
            'api/payment_status'
        );
    }

    public function getBalanceStatus($paybox) {
        return $this->process(
            $paybox,
            'balance_status',
            'api/balance_status'
        );
    }
}

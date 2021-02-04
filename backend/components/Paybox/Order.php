<?php
namespace backend\components\Paybox;

final class Order extends Abstractions\DataContainer {

    public $id;
    public $amount;
    public $description;
    public $timeLimit;

}

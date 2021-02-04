<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of PhpArrayFormatter
 *
 * @author gwork
 */
use yii\helpers\VarDumper;
use yii\web\ResponseFormatterInterface;

class PhpArrayFormatter implements ResponseFormatterInterface
{
    public function format($response)
    {
        $response->getHeaders()->set('Content-Type', 'text/php; charset=UTF-8');
        if ($response->data !== null) {
            $response->content = "<?php\nreturn " . VarDumper::export($response->data) . ";\n";
        }
    }
}
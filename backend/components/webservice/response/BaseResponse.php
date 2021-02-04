<?php
namespace app\components\webservice\response;
 
abstract class BaseResponse
{
    public $result = '';
 
    public function __construct($result)
    {
        $this->result = $result;
    }
}
?>
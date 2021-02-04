<?php
namespace backend\components\webservice\request;
 
class Get_InfoClientIIN extends BaseRequest
{
    public $IIN;
   
 
    public function rules()
    {
        return [
            [['IIN'], 'required'],
            ['IIN', 'string'],
				];
    }
}


?>
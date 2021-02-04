<?php
namespace backend\components\webservice\request;
 
class GetPremiumOGPO extends BaseRequest
{
   
    public $CalculationParameters;
   
   public function maker() {
	$CalculationParameters = ['CalculationParameters' => 

														['listDrivers' => [
																			'IIN' => '621108350580', 
																			'AGE_EXPERIENCE_ID' => '1', 
																			'PENSIONER_BOOL' => '0', 
																			'WOW_BOOL' => '0', 
																			'INVALID_BOOL' => '0' 
																			],],
														['listAuto' =>    [
																			'TF_TYPE_ID' => '4',
																			'REGION_ID' => '15',
																			'TF_AGE_ID' => '1',
																			'TF_BIG_CITY_BOOL' => '1'
																		 ],], 
																		 
																		 ];
   }
    public function rules()
    {
        return [
           
            ['IIN', 'string'],];
    }
}


?>
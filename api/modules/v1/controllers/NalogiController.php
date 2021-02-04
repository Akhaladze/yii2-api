<?php
namespace api\modules\v1\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;


use yii\web\IdentityInterface;
use common\models\User;
use common\models\Nalogi;
use yii\httpclient\Client;



use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
use yii\behaviors\TimeStampBehavior;
use yii\base\Model;
use yii\filters\auth\HttpBasicAuth;

class NalogiController extends ActiveController  {
	
	public $username1 = 'pa_nitro'; 	
    public $password1 = 'dFi9871Denq';		
    public $esic_user = 'sys_pa_nitro';
	public $auth_phrase ='';
		
	public $modelClass = 'common\models\yawebmaster';

	
   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
									'yawebmaster',
									'spravochnikknp',
									'spravochnikkno',
									'spravochnikkbk',
									'get_fio_by_iin',
									
										],
                        'allow' => true,
                       
                    ]
                ],
            ],
						
			
		'authenticator' => [			
				'class' => \yii\filters\auth\HttpBearerAuth::class,

			],
       
			
			
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'yawebmaster' => ['get', 'post'],
                    'spravochnikknp' => ['post'],
                    'spravochnikkno' => ['post'],
                    'spravochnikkbk' => ['post'],
                    'get_fio_by_iin' => ['post']
                ],
            ],
        ]);
    }
	
	
	

// Справочники
 
	public function actionSpravochnikknp() {
	
		return Nalogi::getKNP(); }


	public function actionSpravochnikkno() {
	
		return Nalogi::getKNO(); }


	public function actionSpravochnikkbk() {
	
		return Nalogi::getKBK(); }
		
	
	
	public function actionGet_fio_by_iin () {
		
	
		$model = new Nalogi;
		$model->scenario = Nalogi::SCENARIO_CHECK_IIN;
		$request_body = Yii::$app->request;



		// возвращает параметр "id"
		$taxpayer_iin = $request_body->getBodyParam('taxpayer_iin');
		
		
		$model->taxpayer_iin = $taxpayer_iin;
		
		
		
		if ($model->validate()) {
	
	
	
	$result['success_code'] = 'Данные пользователя прошли валидацию и отправленны в ESIC';
	$result['success'] = 1;

		if (($response = $model->getIin()) && $response['desc'] != 'OK') {
		
			//Yii::$app->session->addFlash('error', 'ИИН не распознан');
			$result['error_code'] = 'ИИН не распознан';
			$result['error_marker'] = 1;
			
		goto end_operation;
			
		} else {
			
										
	$result['success_code']['idn'] = 		$response['data']['row']['idn'];
	$result['success_code']['fio'] = 		$response['data']['row']['fio'];
	$result['success_code']['priznakfl'] = 	$response['data']['row']['priznakfl'];
	$result['success_code']['isinactive'] = $response['data']['row']['isinactive'];
	$result['success_code']['code'] = 		$response['data']['code'];
	$result['success_code']['desc'] = 		$response['data']['desc'];
	$result['success_code']['ver'] =  		$response['data']['ver'];
	$result['success'] = 1;					
			
	$model->taxpayer_name = $response['data']['row']['fio'];
	$model->check_inn_action = 'Перейти к оплате налогов';
		
			
			/*
			array(4) 
			{ 
					["data"]=> array(1) 
								{ 
									["row"]=> array(12) 
											{ 
												["rnn"]=> string(12) "600320637842" 
												["idn"]=> string(12) "890926400946" 
												["isjuridical"]=> array(0) { } 
												["isresident"]=> array(0) { } 
												["isconstant"]=> string(1) "0" 
												["companyname"]=> array(0) { } 
												["fio"]=> string(50) "ӘБЕЕВА МӨЛДІР БАҚЫТБЕКҚЫЗЫ" 
												["dateout"]=> array(0) { } 
												["reasonout"]=> array(0) { } 
												["priznakfl"]=> string(1) "1" 
												["isinactive"]=> string(1) "0" 
												["taxcode"]=> string(4) "6003" 
											} 
								} 
					["code"]=> string(1) "0" 
					["desc"]=> string(2) "OK" 
					["ver"]=> string(4) "1.19"
			}
			
			*/
			
				//return $this->render('nalogibyiin',['model' => $model, 'response' => $response, 'form_param' => $form_param]);
				return $response;
			
			}

		}
		
		end_operation:
		
		return $model->getErrors();
		
	}
			
			
			
			
	
			

	
	
	
/* 	// По платежам в бюджет: можно использовать такую логику: Клиент выбирает Тип платежа. Отображать на экране Клиенту значение КБК по умолчанию, фиксированное значение:
//i. «Налог на имущество с физических лиц. КБК 104102». По данному Типу платежа КНП = 911


//ii. «Налог на транспорт с физических лиц. КБК 104402». КНП = 911
*/



public function actionNalogTransportFl () {


}





//iii. «Земельный налог с физических лиц на земли населенных пунктов. КБК 104302». КНП = 911
//iv. «Единый земельный налог. КБК 104501». КНП = 911


//v. «Пеня по налогу на транспорт с физических лиц. КБК 104402». КНП = 912

public function NalogTransportPenyaFL () {
	
	}


//vi. «Пеня по налогу на имущество с физических лиц. КБК 104102». КНП = 912
//vii. «Земельный налог, за исключением земельного налога с физ. лиц на земли населенных пунктов. КБК 104309». КНП = 911



//viii. «Налог на транспортные средства с физических лиц. КБК 104402». КНП = 911
//– При выборе данного Типа, появляется дополнительно поле обязательное к заполнению VIN-Код, по которому установлено ограничение = 17 символов, допустимы латинские буквы и //цифры.





//– Назначение платежа-заполняется автоматически, дополнительно по налогу на транспорт в назначении платежа   отображается VIN-Код.
//ix. «Иные платежи в бюджет (сборы и пошлины, адм. штрафы по решению суда и т.д.)». При выборе данного Типа платежа открываются 2 дополнительных поля:

//– «Код Бюджетной Классификации (КБК)», справочник, значение выбирается Клиентом. Возможен скроллинг списка, возможен Поиск по Справочнику: По номеру КБК – 4-хзначное значение, По Наименованию – похожее значение;

//– «Код назначения платежа (КНП)» - Справочник, значение выбирается Клиентом. Список усеченный: КНП 911 - 998. Возможен скроллинг списка, возможен Поиск по Справочнику: По //номеру КНП – 3-хзначение, По Наименованию – похожее значение.
	 

	}

	

	
?>	
 
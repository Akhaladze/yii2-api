<?php
namespace api\modules\v1\controllers;
use backend\components\sms\Sms;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;



use nox\http\soap\HttpSoapClient;
use common\models\Orders;
use common\models\ApiSignUp;



use yii\web\IdentityInterface;
use common\models\user;



use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
use yii\behaviors\TimeStampBehavior;
use yii\base\Model;

//use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;



class UserController extends ActiveController  {
	

	
   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
									 'signup'
									,'sms_verification'
									,'fast_code_registration'
									,'changepassword'
									,'set_touch_id'
									,'change_email'
									,'login'
									,'sign_in'],
                        'allow' => true,
                       
                    ]
                ],
            ],
			
			
			'basicAuth' => [
            'class' => \yii\filters\auth\HttpBasicAuth::class,
			'auth' => [$this, 'auth'],
			'only' => ['signup', 'login'],
           
        ],
		//	'authenticator' = >  [
									
			//					'class' => CompositeAuth::class,
			//											
			//											'authMethods' => [
			//														//HttpBasicAuth::class,
			//														HttpBearerAuth::class,
//	=> ['except' => ['signup', 'sign_in']],
																	
					'authenticator' => [			
					'class' => \yii\filters\auth\HttpBearerAuth::class,
					'except' => ['signup', 'login']
			],								
									
			
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'signup' => ['post'],
                    'sms_verification' => ['post'],
                    'fast_code_registration' => ['post'],
                    'change_email' => ['post'],
                    'changepassword' => ['post'],
                    'sign_in' => ['post'],
                    'login' => ['post'],
                    'set_touch_id' => ['post']
                ],
            ],
        ]);
    }


public function auth($username, $password)
    {		
		$api_token = $username . ':' . $password;
		//$api_token = base64_decode($api_token);
        return \common\models\User::findIdentityByApiToken($api_token);
    }
	
	
	

 public $modelClass = 'common\models\User';
 
 
 public function actionSignup() {
		
	if (Yii::$app->request->getBodyParam('username') && Yii::$app->request->getBodyParam('password')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$new_user = new ApiSignUp;
		$new_user->username = $request['username']; 
		$new_user->password = $request['password'];
		$new_user->password_compare = $request['password'];
		
		if (!$new_user->validate()) {
			
			$new_user->addErrors(['error_marker' => 1]);
			
			return $new_user->getErrors();	
			
		}
		else {
		
			//send sms
			//Создаем пользователя
			//Возвращаем ответ
			return $new_user->signup();

			
			}
		}
	}
 
 
 
 public function actionSms_verification() {
		

	if (Yii::$app->request->getBodyParam('user_id') && Yii::$app->request->getBodyParam('sms_code')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$user_id =  $request['user_id']; 
		$sms_code = $request['sms_code'];
		
		
		if ($get_user = User::findIdentity($user_id)) {
			
			if ($get_user->sms_last_code == $sms_code) {
			//$get_user->scenario::User::
			
			$get_user->password = 'Frdfkfyu';
			$get_user->password_compare = 'Frdfkfyu';
			$get_user->sms_verification = 1;
			
				$result_error['error_marker'] = 1;
				$result_error['error_code'] = 'SMS код некорректный';
				
				$result['success_marker'] = 1;
				$result['success_code'] = 'Верификация прошла успешно';
			
			return $get_user->save() ? $result : $result_error; 
			//return $get_user->save() ? 'Верификация прошла успешно' : $get_user->getErrors(); 
		}
		}
		
		else {
			
				$result['error_marker'] = 1;
				$result['error_code'] = 'Запрос который вы прислали не относится ни к одному пользователю';
			return $result; 
			
; 
			
			}
		}
	}
 
  public function actionFast_code_registration() {
		

	if (Yii::$app->request->getBodyParam('user_id') && Yii::$app->request->getBodyParam('fast_code')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$user_id = $request['user_id']; 
		$fast_code = $request['fast_code'];
		
		
		if ($get_user = User::findIdentity($user_id)) {
			
			
			$get_user->fast_code = $fast_code;
			
			$get_user->password = 'Frdfkfyu';
			$get_user->password_compare = 'Frdfkfyu';
			$get_user->fast_code = 1;
			
				$result_error['error_marker'] = 1;
				$result_error['error_code'] = 'Код быстрого доступа некорректный';
				
				$result['success'] = 1;
				$result['success_code'] = 'Код быстрого доступа успешно установлен';
			
			return $get_user->save() ? $result : $result_error; 
		
		}
		
		else {
			
			$result_error['error_marker'] = 1;
			$result_error['error_code'] = 'Запрос который вы прислали не относится ни к одному пользователю';
			
			return $result_error; 
			
			}
		
		}
	}
	
	
	public function actionSet_touch_id() {
		

	if (Yii::$app->request->getBodyParam('user_id') && Yii::$app->request->getBodyParam('touch_id')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$user_id = $request['user_id']; 
		$touch_id = $request['touch_id'];
		
		
		if ($get_user = User::findIdentity($user_id)) {
			
			
			$get_user->touch_id = $touch_id;
			
			return $get_user->save() ? 'Touch_id успешно установлен' : 'Touch_id некорректный'; 
		
		}
		
		else {
			
			return 'Запрос который вы прислали не относится ни к одному пользователю'; 
			
			}
		
		}
	}
	
	
	public function actionChange_email() {
		

	if (Yii::$app->request->getBodyParam('user_id') && Yii::$app->request->getBodyParam('email')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$user_id = $request['user_id']; 
		$email = $request['email'];
		
		if ($get_user = User::findIdentity($user_id)) {
		
			$get_user->password = 'Frdfkfyu';
			$get_user->password_compare = 'Frdfkfyu';
			$get_user->email = $email;
			
				$result_error['error_marker'] = 1;
				$result_error['error_code'] = 'email некорректный';
				
				$result['success'] = 1;
				$result['success_code'] = 'email успешно обновлен';
			
			return $get_user->save() ? $result : $result_error; 
		
		}
		
		else {
			
			$result_error['error_marker'] = 1;
			$result_error['error_code'] = 'Запрос который вы прислали не относится ни к одному пользователю';
			
			return $result_error; 
			
			}
		
		}
	}
	
	public function actionChangepassword() {
		

	if (Yii::$app->request->getBodyParam('username') && Yii::$app->request->getBodyParam('password')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$username = $request['username']; 
		$password = $request['password'];
		
		
		if ($get_user = User::findByUsername($username)) {
			
			
			$get_user->password = $password;
			$get_user->password_compare = $password;
			$get_user->setPassword($password);
			$get_user->sms_verification = 0;
			$api_token = $username . ':' . $password;
			$get_user->api_token = base64_encode($api_token);
			
			if ($get_user->validate() && $get_user->save()){
		
		$phone = $get_user->username;
		$message = 'Код подтверждения nitro.kz: ' . $get_user->sms_last_code;
		
	//	$sms_response = Sms::send($phone, $message, $originator='Originator', $rus=5, $udh='');
		
        
		//return $user->id, $sms_response;
        
	//	return $user->id;
		return $get_user;
    }
			
			
			return $get_user->save() ? 'Пароль обновлен, введите СМС код для активации нового пароля ' : 'Пароль некорректный'; 
		
		}
		
		else {
			
			
			return 'Запрос который вы прислали не относится ни к одному пользователю'; 
			
			}
		
		}
	}
 
 
 
 public function actionLogin() {
		

	if (Yii::$app->request->getBodyParam('username') && Yii::$app->request->getBodyParam('password')) {
		
		$request = Yii::$app->request->BodyParams;
		
		$username = $request['username']; 
		$password = $request['password'];
		
		
		if ($get_user = User::findByUsername($username)) {
			
			 if($get_user->validatePassword($password)) {
			
					return $get_user; 
				 
			 } else {
				 
				 goto error_pass;
				 
			 }

		}
		
		
		else {
			error_pass:
			
				$result['error_marker'] = 1;
				$result['error_code'] = 'Вы ввели неправильный логин или пароль';
			return $result; 
			
			}
		
		}
	}
 
 
 
 
	
}

	

?>
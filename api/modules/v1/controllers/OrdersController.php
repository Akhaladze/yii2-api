<?php
namespace api\modules\v1\controllers;

use Yii;


use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;

use yii\web\IdentityInterface;
use common\models\User;



use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
use yii\behaviors\TimeStampBehavior;
use yii\base\Model;
use yii\filters\auth\HttpBasicAuth;

class BlogpostController extends ActiveController 

{

   
public $modelClass = 'akiraz2\blog\models\BlogPost';
	
   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [ 
                                    'search'
                                    ,'get_bm_fio'				
			],
                        'allow' => true,
                      
                    ],
                ],
            ],
			
			
						
			
            'authenticator' => [			
            'class' => \yii\filters\auth\HttpBearerAuth::class,
	],

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                'search' => ['post','get'],
                'get_bm_fio' => ['post'],
		],
            ],
		]
     );
 }


		

 
 public function actionSearch() {

 }


    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
			
			$model->ts = Ts::findOne(['order_id' => $id]);
			$model->driver = Drivers::findOne(['order_id' => $id]);
		
			return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	

	
	


}


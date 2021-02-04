<?php
namespace api\modules\v1\controllers;

use Yii;


use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;

//use yii\web\IdentityInterface;
//use common\models\User;
use akiraz2\blog\models\BlogPost;
use akiraz2\blog\models\BlogPostSearch;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
//use yii\behaviors\TimeStampBehavior;
//use yii\base\Model;
//use yii\filters\auth\HttpBasicAuth;

class CategoryController extends ActiveController 

{

   
public $modelClass = 'akiraz2\blog\models\BlogCategorySearch';

   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [ 
                                    'search'
                                    ,'index'				
			],
                        'allow' => true,
                      //   'roles' => ['?'],
                      
                    ],
                ],
            ],
			
			
						
	/*		
            'authenticator' => [			
            'class' => \yii\filters\auth\HttpBearerAuth::class,
            ],
        */
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                'search' => ['post','get'],
                 'index' => ['post','get'],   
                'get_bm_fio' => ['post'],
		],
            ],
		]
     );
 }


 
 public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => function () {
                 $searchModel = new BlogCategorySearch();
                    return $searchModel->search(Yii::$app->request->queryParams);
                },
            ],
        ];
    }
 
		

 
 public function actionSearch() {
     
     $requestParams = Yii::$app->getRequest()->getBodyParams();
    if (empty($requestParams)) {
        $requestParams = Yii::$app->getRequest()->getQueryParams();
    }

    /* @var $modelClass \yii\db\BaseActiveRecord */
    $modelClass = $this->modelClass;

    $query = $modelClass::find();
    if (!empty($requestParams)) {
        $query->andWhere($requestParams);
    }

    return Yii::createObject([
        'class' => ActiveDataProvider::className(),
        'query' => $query,
        'pagination' => [
            'params' => $requestParams,
        ],
        'sort' => [
            'params' => $requestParams,
        ],
    ]);
    
     
 }



}


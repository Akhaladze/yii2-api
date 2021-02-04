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
use akiraz2\blog\models\BlogComment;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogTag;
use common\models\User;
use akiraz2\blog\models\BlogPostSearch;
use akiraz2\blog\models\BlogTagSearch;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
//use yii\behaviors\TimeStampBehavior;
//use yii\base\Model;
//use yii\filters\auth\HttpBasicAuth;

header("Access-Control-Allow-Origin: *");
header("AMP-Same-Origin: true");

header("Cache-Control: private, no-cache");
header("Access-Control-Max-Age: 300");
header('Access-Control-Allow-Origin: https://cdn.ampproject.org');
header('Access-Control-Allow-Origin: https://space--warriors-com.cdn.ampproject.org');
header('Access-Control-Allow-Source-Origin: https://space-warriors.com');
header('Access-Control-Allow-Source-Origin: https://cdn.space-warriors.com');
header('Access-Control-Expose-Headers');
header('AMP-Access-Control-Allow-Source-Origin: https://space-warriors.com');



 
 
//	header("Content-Type: application/json");
	/*
	if($_SERVER[HTTP_ORIGIN] == "https://cdn.ampproject.org") {
    header('Access-Control-Allow-Origin: https://cdn.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	
	if($_SERVER['HTTP_ORIGIN'] == "https://space--warriors-com.ampproject.org") {
    header('Access-Control-Allow-Origin: https://space--warriors-com.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	
	if($_SERVER['HTTP_ORIGIN'] == "https://cdn.ampproject.org") {
    header('Access-Control-Allow-Origin: https://cdn.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	*/
	
	
 




class SearchController extends ActiveController 

{

   
public $modelClass = 'akiraz2\blog\models\BlogTagSearch';

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
                'index' =>  ['post','get'],   
               
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
                 $searchModel = new BlogTagSearch();
                    return $searchModel->search(Yii::$app->request->queryParams);
                },
            ],
                        
            
        ];
                
    }
 

public function actionSearch() {
        $items='';
        $tags = BlogTag::find()
							->select("name")
							->asArray()
							->orderby('frequency DESC')
							->all();

		foreach($tags as $tag) {
			
		$items[] = $tag['name'];
			
		}
		
		
		return $items;
        
}

	

	
	

}


<?php
namespace console\controllers;
ini_set('max_execution_time', 3600);
ini_set('memory_limit', '8192M');

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;





// use ActiveController;

use common\models\Xml;


//use yii\console\Controller;


use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\BaseConsole;
use yii\helpers\Console;


use \akiraz2\blog\Module;

use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

class XmlController extends \yii\console\Controller
{


public function actionMakexml()

	{

ini_set('max_execution_time', 3600);
ini_set('memory_limit', '8192M'); 

		$xml = new Xml;
		
		foreach ($xml as $xml_item) {
			
			$print_r ($xml_item);
			
			
		}


	}
				

}

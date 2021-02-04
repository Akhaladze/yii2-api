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

use ActiveController;

use common\models\Utnew;
use common\models\Bpold;
use common\models\DataMap;
use yii\console\Controller;


use yii\helpers\Url;
use yii\helpers\StringHelper;


use \akiraz2\blog\Module;

use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

class dataController extends Controller
{
	
	
public function actionMakedb()

	{

ini_set('max_execution_time', 3600);
ini_set('memory_limit', '8192M');		
	 
  function wordLetterPairs ($str)
{
	
	
	
    $allPairs = array();

    // Tokenize the string and put the tokens/words into an array

    $words = explode(' ', $str);

    // For each word
    for ($w = 0; $w < count($words); $w ++) {
        // Find the pairs of characters
        $pairsInWord = letterPairs($words[$w]);

        for ($p = 0; $p < count($pairsInWord); $p ++) {
            $allPairs[$pairsInWord[$p]] = $pairsInWord[$p];
        }
    }

    return array_values($allPairs);
	//$unset($allPairs);
	$unset($pairsInWord);
}


  function letterPairs ($str)
{
    $numPairs = mb_strlen($str) - 1;
    $pairs = array();

    for ($i = 0; $i < $numPairs; $i ++) {
        $pairs[$i] = mb_substr($str, $i, 2);
    }

    return $pairs;
	$unset($numPairs);
	//$unset($pairs);
}


 
  function compareStrings ($str1, $str2)
	{
    $pairs1 = wordLetterPairs(mb_strtolower($str1));
    $pairs2 = wordLetterPairs(mb_strtolower($str2));


    $union = count($pairs1) + count($pairs2);

    $intersection = count(array_intersect($pairs1, $pairs2));

    return (2.0 * $intersection) / $union;
	
	$unset($pairs1);
	$unset($pairs2);
}		
		
		
		$this->layout = '@frontend/views/layouts/empty.php';
        $utnew = new Utnew;
		$bpold = new Bpold;
		$datamap = new DataMap;
		
		
		$utnew = $utnew->find()->all();
		$bpold = $bpold->find()->all();
		$datamap = $bpold->find()->all();
		
			
		foreach($utnew as $ut) {
			
			foreach($bpold as $bp) {
				
										$bp_val = $bp->BPFS;
										$ut_val = $ut->UT_FN_FS_MODIF;
									
										$param1 = ")";
										$param2 = "(";
										
										$bp_val = str_replace($param1,'',$bp_val);
										$ut_val = str_replace($param1,'',$ut_val);
										
										$bp_val = str_replace($param2,'',$bp_val);
										$ut_val = str_replace($param2,'',$ut_val);
										
										
										$bp_val=str_replace('_','',$bp_val);
										$ut_val=str_replace('_','',$ut_val);
										
										$bp_val=str_replace('-','',$bp_val);
										$ut_val=str_replace('-','',$ut_val);
										
										/* Вычисляем значение по алгоритму Саймона Вайта */
										$saymon_wait = compareStrings($bp_val, $ut_val);
										$similar_text = similar_text($bp_val, $ut_val, $saymon_wait);
				
				
				
				
				$matamap->ut_id = $ut->id;
				$matamap->bp_id = $bp->id;
				
				
				
				$matamap->sim =	$similar_text;
				$matamap->sa = $saymon_wait;

				$matamap->save();
				
				
				
				
				
			}

		}
		}
		}
		
		
		
		
	

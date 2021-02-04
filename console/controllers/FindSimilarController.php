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

use common\models\Utnew;
use common\models\Bpold;
use common\models\DataMap;
use common\models\Ms;
use common\models\User;
//use yii\console\Controller;


use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\BaseConsole;
use yii\helpers\Console;


use \akiraz2\blog\Module;

use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

class FindSimilarController extends \yii\console\Controller
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
		
		$utnew = $utnew->find()->all();
		$bpold = $bpold->find()->all();

/*	
		$message = Yii::$app->mailer->compose();

		
if (Yii::$app->user->isGuest) {
    
	$message->setFrom('robot@akademorto.kz');

	
}
 else {

    $message->setFrom(['4468618@gmail.com']);
}



$message->setTo(Yii::$app->params['adminEmail'])
    ->setSubject('Поиск соответсвий продолжается')
    ->setTextBody('Робот начал новый поиск лучших соответсвий БП-УТ')
    ->send();
		
		*/
		
		
		
		
			
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
									//	$saymon_wait = compareStrings($bp_val, $ut_val);
									//	$similar_text = similar_text($bp_val, $ut_val);
				
			
				$datamap = new DataMap;
				$datamap->findOne(['ut_id'=>$ut->id , 'bp_id'=>$bp->id]);
			//	$datamap->ut_id =$ut->id;
			//	$datamap->bp_id = $bp->id;

			//	$datamap->sim =	$similar_text;
			//	$datamap->sa = $saymon_wait;
				
				$datamap->ut_name = $ut->UT_NAME . " " . $ut->UT_CHARACHTER;
			//	$datamap->ut_code =$ut->UT_SCODE_ORIGINAL;
			//	$datamap->bp_name = $bp->BP_NAME;
			//	$datamap->bp_art = $bp->BP_ART;


				$datamap->save();
				
				
				
				}	
			
		}
	}
	
	
public function actionMakerezult()

	{

		
		$bpold = Bpold::find()
						->where(['BP_UT_FOUND' => null])
						
						->all();
		BaseConsole::clearScreen();
		foreach($bpold as $bp) {
				
				$sql = 'SELECT * 
				FROM DataMap 
				WHERE bp_id= '. $bp->id .' 
				AND sa > 50
				AND sim > 50
				
				ORDER BY sa DESC,
				sim DESC
				
				
				
				LIMIT 250';
				
				$datamap = DataMap::findBySql($sql)->all();

				
			
				//system("clear");
				BaseConsole::clearScreen();
				echo "ПОИСК НАИЛУЧШЕГО ЗНАЧЕНИЯ \r\n";
				echo "ID:: " . $bp['id'] . "\r\n";
				echo "BP НАИМЕНОВАНИЕ: " . $this->ansiFormat($bp['BP_FULL_NAME'], Console::FG_YELLOW) . "\r\n";
				echo "ВАРИАНТЫ ЗНАЧЕНИЙ \r\n";
				$id=1;	
				
				if (count($datamap)!=0) {
					
					$rez_array[]=[
						'ut_id' => 0,
						'ut_name' => 'NOT_FOUND',
						'ut_code' => '00000'
						];
					
					foreach($datamap as $data) {
						
						echo $this->ansiFormat($id, Console::FG_RED, Console::UNDERLINE,1) ." ". $this->ansiFormat($data['ut_name'], Console::ITALIC,Console::UNDERLINE ) . " ";
						echo $this->ansiFormat("SA: " . $data['sa'] . " - SIM: " . $data['sim'] . "\r\n", 6);
						
						$rez_array[] = [
						'ut_id' => $data['ut_id'],
						'ut_name' => $data['ut_name'],
						'ut_code' => $data['ut_code']						
						];
						$id++;
					}
						
						
					(int)$condole_ut_id = BaseConsole::input("Введите лучший вариант ID UT: или 0 - чтобы перейти дальше ");
						
						if ($condole_ut_id) {

						echo $this->ansiFormat("Отлично, записываем " . $condole_ut_id . "\r\n", 6);
						echo $this->ansiFormat(print_r($rez_array[$condole_ut_id])  . "\r\n",6);
						
						$bp->BP_UT_FOUND = $rez_array[$condole_ut_id]['ut_code'];
						$bp->UT_SCODE = $rez_array[$condole_ut_id]['ut_name'];
						$bp->NameUT = $rez_array[$condole_ut_id]['ut_id'];
						$bp->save();
						//return 0;
						unset($id);
						system("./yii find-similar/makerezult");
						}
						
				} else 
				{
					
					$this->ansiFormat('НЕ НАЙДЕН - ПЕРЕХОД К СЛЕДУЮЩЕЙ ПОЗИЦИИ', 6);
					$bp->BP_UT_FOUND = '0000';
					$bp->save();
					unset($id);
				}
			}
		}
	/************************************************Поиск по частям
	
	public function actionMytest()
	{
			//	$bp_parts = "1082у Бюстгальтер ортопедический для фиксации ПГЖ  размер (80-C) БЕЖЕВЫЙ";
			//	$ut_art="0182у";
			//	$ut_name = "1082у  Бюстгальтер ортопедический для фиксации ПГЖ";
			//	$ut_char = "бежевый_80 C";
				
				
				$bp_= new Bpold;
				$bp_ = $bp_->find()->all();
				$ut_= new Utnew;
				$ut_ = $ut_->find()->all();
				
				foreach ($bp_ as $bp ) {
				
				$pos_cat_bp = strripos($bp->BP_FULL_NAME, 'Бюстгальтер');
				
				if ($pos_cat_bp===false) {
					echo "BP Name". $bp->BP_FULL_NAME . " \r\n";
					echo "Нет вхождения  \r\n";
				} else {
					
					foreach ($ut_ as $ut ) {
				
					$pos_cat_ut = strripos($ut->UT_NAME, 'Бюстгальтер');
				
				if ($pos_cat_ut===false) {
					echo "UT Name". $ut->UT_NAME . " \r\n";
					echo "Нет вхождения  \r\n";
				} else {
				
				
				$bp_parts = $bp->BP_FULL_NAME;
			//	$ut_art="";
				$ut_name = $ut->UT_NAME;
				$ut_char = $ut->UT_CHARACHTER;
				
				
				
				
			//	$ut_name=str_replace($ut_art,'',$ut_name);
				
				/*Очистка 
				$bp_parts=str_replace('_',' ',$bp_parts);
			//	$ut_art=str_replace('_',' ',$ut_art);
				$ut_name=str_replace('_',' ',$ut_name);
				$ut_char=str_replace('_',' ',$ut_char);
				
				$bp_parts=str_replace(',',' ',$bp_parts);
				$ut_name=str_replace(',',' ',$ut_name);
				$ut_char=str_replace(',',' ',$ut_char);
				
				$bp_parts=str_replace('   ',' ',$bp_parts);
			//	$ut_art=str_replace('   ',' ',$ut_art);
				$ut_name=str_replace('   ',' ',$ut_name);
				$ut_char=str_replace('   ',' ',$ut_char);
				
				$bp_parts=str_replace('  ',' ',$bp_parts);
			//	$ut_art=str_replace('  ',' ',$ut_art);
				$ut_name=str_replace('  ',' ',$ut_name);
				$ut_char=str_replace('  ',' ',$ut_char);

				$param1 = ")";
				$param2 = "(";
										
				$bp_parts = str_replace($param1,'',$bp_parts);
			//	$ut_art = str_replace($param1,'',$ut_art);
				$ut_name = str_replace($param1,'',$ut_name);
				$ut_char = str_replace($param1,'',$ut_char);
										
				$bp_parts = str_replace($param2,'',$bp_parts);
			//	$ut_art = str_replace($param2,'',$ut_art);
				$ut_name = str_replace($param2,'',$ut_name);
				$ut_char = str_replace($param2,'',$ut_char);
										
			
				echo "BP" . $bp_parts . "\r\n";
				echo "UT" . $ut_name ." ". $ut_char. "\r\n";
				
				$ut_parts = $ut_name ." ". $ut_char. "\r\n";
				$ut_parts = explode(' ', $ut_parts);
			
				$max_score=0;

				foreach($ut_parts as $part){
				$score=0;
				$score_count=0;
				
				
				
			//	preg_match('/('.$part.'+)/i', $bp_parts, $maches);
				
				$pos = strripos($bp_parts, $part);
				
				if ($pos === false) {
			
				echo "К сожалению," .  $part . " не найдена в " . $bp_parts . "\r\n";
				$score--;
				$score_count++;
				} else {
						
				echo "Поздравляем!\n";
				echo "Последнее вхождение " .  $part . " найдено в " .  $bp_parts . " в позиции " .  $pos . "\r\n";
				$score++;
				$score_count++;
				}
				
				
				
				$rez = $score/$score_count;
				if ($rez>0.85) { echo $this->ansiFormat('НАШЛИ!', Console::FG_RED, Console::UNDERLINE,1); sleep(10);}
				echo $this->ansiFormat($rez, Console::FG_RED, Console::UNDERLINE,1);
				
				//sleep(10);
				
					
					/* END Magic Strripos 
					}
				/* END Foreach UT 
				}
			/* END Check Cat 
			}
				
				
				
				
		
		
		/* END Foreach BP 
		}

	/* END Mytest 
	}	
	*/
}
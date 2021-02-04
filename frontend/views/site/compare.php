<?php
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



	
		
		foreach($bpold as $bp) {
		
			
		
		
							foreach($utnew as $ut) {
							
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
										//$similar_text = similar_text($bp_val, $ut_val, $saymon_wait);
									

	
					
				
		if ( $saymon_wait > 0.88 && $ut->UT_CHARACHTER !=null && strlen($ut->UT_CHARACHTER) > 4) {
					
								
						
					
					
					$name = $ut->UT_NAME;
					$name = trim($name);
					$char = $ut->UT_CHARACHTER;
					$char = trim($char);
					
					$ut_parts = explode(' ', $name ." ". $char);
					$bp_parts = $bp_val; 
					$saymon_wait_counter = 1;
					$compare_store['AVG'] = $saymon_wait; 
					
					foreach ($ut_parts as $ut_part){
										
									
										$step = 0;
										
										$UT_PART = trim($ut_part);
										$distance = (int)strlen($bp_parts) - (int)strlen($UT_PART);
										
										
										
						while ($distance<=0):
										$active_surface = (int)strlen($UT_PART);
										$BP_PART = substr($bp_parts, $step, $active_surface);
										$step++;
										$distance--;
										endwhile;
										
										
							if (strlen($BP_PART) >= 3 && strlen($UT_PART) >= 3 ) {
										
											$result = compareStrings($BP_PART, $UT_PART);
											similar_text($BP_PART, $UT_PART, $result2);										
							} 
						
			}
	
								
								
																	
					// END ROUND 3				
												
					// Можно подвести итоги и записаить в базу

						$str_bp = preg_replace("/[^0-9]/", '', $bp_val);
						$str_ut = preg_replace("/[^0-9]/", '', $ut_val);
						
						
						
						
						echo '<b style="color:green">Проверка на цифровой отпечаток - с конца строки</b></br>';
						
						
						if((substr($str_bp, -2) === (substr($str_ut,-2))) ||
								(substr($str_bp, -3) === (substr($str_ut,-3)))||
								(substr($str_bp, -4) == (substr($str_ut,-4))))
							{
								$SCORE['digits_from_last'] = 10;
								echo '<b style="color:green">+10: совпадает цифровой отпечаток - с конца строки</b>';
								
							
							}
						
						echo '<b style="color:green">+10: Проверка на совпадения последних символов (одного)совпадает последний символ</b></br>';
						
						
						if((substr($bp_val,strlen($bp_val),-1)) === (substr($ut_val,strlen($ut_val),-1))) {
							
									$SCORE['last_character'] = 10;
							echo '<b style="color:green">+10: совпадает последний символ</b>';
							} 
							echo '<b style="color:green">+10: Проверка заработанных балов</b></br></br>';
						
						if	(((isset($SCORE['digits_from_last']))||(isset($SCORE['first_char'])))&&
							((isset($SCORE['AVG']))||(isset($SCORE['first_char']))))
							
							{
							
							echo '<b style="color:green">+30: набранные балы позволяют сделать запись в базу</b>';
						
							/* Save to DB*/
							$bp->BP_UT_FOUND = $ut->UT_SCODE_ORIGINAL;
							$bp->UT_SCODE = $ut->UT_NAME;
							$bp->NameUT = $ut->UT_CHARACHTER;
							$bp->save();
						
				
							}	
					
							print_r($SCORE);
							$compare_store['current_bp'] = $bp_val;
							$compare_store['current_ut'] = $ut_val;
							$last_saymon_wait = $saymon_wait;
							echo 'Совпадение' . '<br>База БП:: ' . $bp_val  . ' ::Строка в базе УТ:: ' . $ut_val . ' :: Saymon Wait ' . $saymon_wait;
							echo '<br><br>';
							echo '<b style="color:green">СОХРАНЕН</b>';
			
							
		}
		
		}
		
		}
		
			unset($bp);	
			unset($ut);	
			unset($bp_val);	
			unset($ut_val);	
			unset($UT_PART);	
			unset($BP_PART);	
			unset($SCORE);	
			unset($name);	
			unset($char);	
												
							
							
							
												
?>
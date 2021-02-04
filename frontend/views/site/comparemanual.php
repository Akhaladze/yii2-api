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
}


  function letterPairs ($str)
{
    $numPairs = mb_strlen($str) - 1;
    $pairs = array();

    for ($i = 0; $i < $numPairs; $i ++) {
        $pairs[$i] = mb_substr($str, $i, 2);
    }

    return $pairs;
}


 
  function compareStrings ($str1, $str2)
	{
    $pairs1 = wordLetterPairs(mb_strtolower($str1));
    $pairs2 = wordLetterPairs(mb_strtolower($str2));


    $union = count($pairs1) + count($pairs2);

    $intersection = count(array_intersect($pairs1, $pairs2));

    return (2.0 * $intersection) / $union;
}




		
		foreach($bpold as $bp) {
		
			$i=1;
			$similar_max=0;
			$similar=0;
			$saymon_wait_max=0;
			$saymon_wait=0;
		
		
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
				

	
					
				
				if ( $saymon_wait > 0.3 && $ut->UT_CHARACHTER !=null && strlen($ut->UT_CHARACHTER) > 4) {
					
					echo $saymon_wait . '<br>';					
						
					?>
			Обрабатывается Номенклатура: БУХГАЛТЕРИЯ КАЗОРТОГРУПП
			<html>
			<body>
			<form id="compare_manual" action="/site/compare_updater">
			<input type="text" class="form-control" id="cc-name" placeholder="<?=$bp_val?>" required="">
			СПИСОК СООТВЕТСТВИЙ
			
			<div class="d-block my-3">
           
					<label class="custom-control-label" for="debit"><?=$ut_val?></label>
			<div class="custom-control custom-radio">
                <input id="" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit"><?=$ut->UT_FULLNAME_SEARCH?></label>
              </div>
			  </form>
			  </body>
</html>
			  
      				
					
<?php

					
				}

						
					
				}
				}	
					
					
?>
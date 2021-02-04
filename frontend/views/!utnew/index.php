<?php


$i=1;
		foreach($bpold as $bp) {
			foreach($utnew as $ut) {
		
			similar_text($bp->BPFS, $ut->UT_FN_FS_MODIF, $similar);
			
			if ($similar >90) {
				
				echo 'Совпадение № ' . $i . 'BP' . $bp->BP_FULL_NAME  . '-Строка в базе УТ -' . $ut->UT_FULLNAME_SEARCH;
				echo '<br>';
				$i++;
			}

	
		
	}
		}
?>
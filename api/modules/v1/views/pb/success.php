<?php
if (isset($request)) { ?>

		<h1><?php echo 'Ваш заказ № ' . $request['pg_order_id'] . ' был успешно оплачен!';  ?></h1>	
		<h2><?php echo 'Код платежа ';?></h2>
		
			
<?php print_r($request);
	} 

?>
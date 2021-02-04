<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>
		
 <div id="<?=$model->id;?>"  data-sort-time="<?=$model->created_at;?>">
      <div class="ampstart-card m1 blog">
       <?php if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $model->id . '.jpg')) {
		?>
		<amp-img src="<?php echo 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $model->id . '.jpg';?>"
          layout="responsive"
          width="400"
          height="300">
        </amp-img>
<?php	
				echo Html::img('https://space-warriors.com/frontend/web/img/blog/blogPost/' . $model->id . '.jpg'); 
				}
				?>
	   
	   
	   <amp-img src="https://space-warriors.com/no_image.png"
          layout="responsive"
          width="400"
          height="300">
        </amp-img>
        <h4 class="title"><?=$model->title;?></h4>
        <p class="date"><?= Yii::$app->formatter->asDate($model->created_at); ?></p>
        <p class="text"><?=$model->brief;?></p>
        <p class="social-share">
          <amp-social-share type="twitter"
            width="45"
            height="33"
            data-param-url="<?php $model->url;?>"></amp-social-share>
          <amp-social-share type="facebook"
            width="45"
            height="33"
            data-attribution="254325784911610"
            data-param-url="<?php $model->url;?>"></amp-social-share>
          <amp-social-share type="gplus"
            width="45"
            height="33"
            data-param-url="<?php $model->url;?>"></amp-social-share>
          <amp-social-share type="email"
            width="45"
            height="33"
            data-param-url="<?php $model->url;?>"></amp-social-share>
          <amp-social-share type="pinterest"
            width="45"
            height="33"
            data-param-url="<?php $model->url;?>"></amp-social-share>
        </p>
      </div>
    </div>
	
	
	
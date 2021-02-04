<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;

?>
 
		  {
            "@type": "BlogPosting",
            "headline": "<?=$model->title;?>",
            "url": "<?=$model->url; ?>",
            "datePublished": "<?= Yii::$app->formatter->asDate($model->created_at); ?>",
            "author": {
            
					  "@type": "Person",
					  "sameAs": "https://github.com/Akhaladze",
					  "name": "Georgiy Akhaladze"
			},
            "articleBody": {
              "@type": "Text"
            },
            "publisher": {
            "@type": "Organization",
			"name": "Space-Warriors",
			"logo": {
			"@type": "ImageObject",
			"url": "https://space-warriors.com/logo.jpg",
			"width": "512",
			"height": "512"
			}
            },
            "image": {
			"@type": "ImageObject",
			"url": " <?php echo 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $model->id . '.jpg'; ?>",
			"height": "209",
			"width": "209"
			},
			}
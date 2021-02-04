<?php
//namespace akiraz2\blog\assets;
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\widgets\ListView;
use \akiraz2\blog\Module;
use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCategory;
use \kartik\icons\Icon;


//AppAsset::register($this);  // $this - представляет собой объект представления

//$this->registerCssFile('path/to/myfile');
//rmrevin\yii\fontawesome\AssetBundle::register($this);




$this->title = Module::t('blog', 'Blog');
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => Yii::$app->name. ' '.Module::t('blog', 'Blog')
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => Yii::$app->name.', '.Module::t('blog', 'Blog')
]);

if(Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => $this->title,
        'description' => Module::t('blog', 'Blog'),
        //'image' => '',
    ]);
}
//$this->params['breadcrumbs'][] = '文章';

/*$this->breadcrumbs=[
    //$post->category->title => Yii::app()->createUrl('post/category', array('id'=>$post->category->id, 'slug'=>$post->category->slug)),
    '文章',
];*/





echo '
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LiveBlogPosting",
    "url": "https://space-warriors.com/blog/",
    "articleBody": "Space-Warriors: useful IT HowTo Collection",
    "datePublished": "<?php //echo date("D M j G:i:s T Y");?>2016-09-08T23:04:28.24337",
    "about": {
      "@type": "Event",
      "description": "Цикл статей в стиле WhoTo для быстрых и проверенных решений на каждый день, вашей безопасности и прочие ИТ полезности",
      "startDate": "2018-12-18T00:00:00-00:00",
      "endDate": "2019-01-01T00:00:00-00:00",
      "name": "База знаний сообщества Space-Warriors.com",
      "url": "https://space-warriors/blog/",
      "location": {
        "@type": "EventVenue",
        "name": "Space-Warriors Office",
        "address" : {
          "@type": "PostalAddress",
          "streetAddress": "Severinovskaya, 128",
          "addressLocality": "Irpen",
          "addressRegion": "Kiev Region",
          "postalCode": "80203",
          "addressCountry": "UA"
        }
      }
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
    "author": {
      "@type": "Person",
      "sameAs": "https://github.com/Akhaladze",
      "name": "Georgiy Akhaladze"
    },
    "image": {
      "@type": "ImageObject",
      "url": "https://space-warriors.com/Akhaladze.jpg",
      "height": "209",
      "width": "209"
    },
    "coverageStartTime": "2018-12-18T00:00:00-00:00",
    "coverageEndTime": "2019-01-01T00:00:00-00:00",
    "headline": "Цикл статей в стиле WhoTo для быстрых и проверенных решений на каждый день, вашей безопасности и прочие ИТ полезности",
    "description": "Наш первій живой блог!",
	"liveBlogUpdate": [ ';
	
foreach($blogposts as $pos) {
	
	
echo '	
	
		  {
            "@type": "BlogPosting",
            "headline": "' . $pos["title"] . '",
            "url": "'.$pos["url"] .'",
            "datePublished": "' . Yii::$app->formatter->asDate($pos["created_at"]) . '",
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
			"url": "https://space-warriors.com/frontend/web/img/blog/blogPost/' . $pos["id"] . '.jpg",
			"height": "209",
			"width": "209"
			},
			}';
}
                	
				
echo '
			]
  }
  
</script>';
?>


<section class="container px2 py3">
  <h1 class="mt0">
    <a href="/blog" class="black">
      Space-Warriors: База знаний
    </a>
  </h1>
  
    
	
	
	

<div class="clearfix mxn2">
    <div class="sm-col sm-col-8 md-col-9 px2">
   
<amp-live-list 
  layout="container"
  data-poll-interval="15000"
  data-max-items-per-page="5"
  id="amp-live-list-insert-blog">

  <button id="live-list-update-button"
    update
    on="tap:amp-live-list-insert-blog.update"
    class="ampstart-btn caps">Информация обновлена</button>
	
	<div items>
	

				  <?php 
				 
				  foreach($blogposts as $post) { ?>
			
	<div id="<?=$post['id'];?>"  data-sort-time="<?=$post['created_at'];?>">
     
	 <div class="ampstart-card m1 blog">
	  
       <?php if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $post['id'] . '.jpg')) {
		?>
		<amp-img src="<?php echo 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $post['id'] . '.jpg';?>"
          layout="responsive"
          width="400"
          height="300">
        </amp-img>
	   <?php	} else { ?>
	   
	   
	   <amp-img src="https://space-warriors.com/no_image.png"
          layout="responsive"
          width="400"
          height="300">
        </amp-img>
		
	   <?php }?>
      
         <h2 class="h3">
          <a href="<?=$post['url']?>" class="black">
           <?=$post['title'];?>
          </a>
        </h2>
		
		<p class="date"><?= Yii::$app->formatter->asDate($post['created_at']); ?></p>
        <p class="text"><?=$post['brief'];?></p>
        
		 
		
		
		
		<p class="social-share">
          <amp-social-share type="twitter"
            width="45"
            height="33"
            data-param-url="<?php $post['url'];?>"></amp-social-share>
          <amp-social-share type="facebook"
            width="45"
            height="33"
            data-attribution="254325784911610"
            data-param-url="<?php $post['url'];?>"></amp-social-share>
          <amp-social-share type="gplus"
            width="45"
            height="33"
            data-param-url="<?php $post['url'];?>"></amp-social-share>
          <amp-social-share type="email"
            width="45"
            height="33"
            data-param-url="<?php $post['url'];?>"></amp-social-share>
          
        </p>
      </div>
    </div>
	
	
					  
					  
					  
				<?php  }?>
				  
				  
				  
	

	
	</div>
	  


  <div pagination>
    <nav aria-label="amp live list pagination">
      <ul class="pagination">
        
        <li>1</li>
        
        <li>
          <a href=>"Next</a>
        </li>
        
      </ul>
    </nav>
  </div>

</amp-live-list>	
	</div>			
	 		

<div class="sm-col sm-col-4 md-col-3 px2 sm-show">
      <h3 class="h4">Другие разделы</h3>
      <ul class="list-reset">
       
                    <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => ''
                            //    'class' => 'list-unstyled'
                            ]
                        ]);
                        ?>
      </ul>
    </div>
 </div>	
</section>
				



   
				
				<?php /* 
				<div class="col-md-5">
				
                    <div class="blog-index__search">
                        <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'blog-index__cat'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
				
				*/ ?>
				
            </div>

        
   


        </div>
	</div>
</div>




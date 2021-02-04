<?php
//namespace akiraz2\blog\assets;
use yii\widgets\ListView;
use \akiraz2\blog\Module;
use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogTag;
use \kartik\icons\Icon;

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
    "datePublished": "' . date("D M j G:i:s T Y") . '",
    "about": {
      "@type": "Event",
      "description": "Цикл статей в стиле WhoTo для быстрых и проверенных решений на каждый день, вашей безопасности и прочие ИТ полезности",
      "startDate": "2018-12-18T00:00:00-00:00",
      "endDate": "2019-12-31T00:00:00-00:00",
      "name": "База знаний сообщества Space-Warriors.com",
      "url": "https://space-warriors.com/blog/",
      "image": [
        "https://space-warriors.com/frontend/web/img/blog/blogPost/73.jpg",
        "https://space-warriors.com/frontend/web/img/blog/blogPost/47.jpg",
        "https://space-warriors.com/frontend/web/img/blog/blogPost/48.jpg"
        ],
        "offers": {
        "@type": "AggregateOffer",
         "lowPrice": "$50",
         "offerCount": "19",
         "availability": "http://schema.org/InStock",
         "price":"50",
         "url": "https://space-warriors.com/site/about",
         "validFrom": "2018-12-01T00:01", 
         "priceCurrency": "USD"
         },
         "performer": [
         {
          "@type": "Person",
          "sameAs": "https://github.com/Akhaladze",
          "name": "Georgiy Akhaladze"
        }
        ],
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
    "coverageEndTime": "2019-12-31T00:00:00-00:00",
    "headline": "Цикл статей в стиле WhoTo для быстрых и проверенных решений на каждый день, вашей безопасности и прочие ИТ полезности",
    "description": "Наш первый живой блог!",
	"liveBlogUpdate": [ ';

	$first_comma=true;
	
foreach($blogposts as $pos) {
	
	if (!isset($first_comma)) echo ",";
echo '
	{
            "@type": "BlogPosting",
            "headline": "' . $pos["title"] . '",
            "url": "'.$pos["url"] .'",
            "mainEntityOfPage": {
           "@type": "WebPage",
           "@id": "https://space-warriors.com/blog/"
            },
            "dateModified": "' . date("c", $pos["updated_at"]) . '",
            "datePublished": "' . date("c", $pos["created_at"]) . '",
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
			"width": "512"
			
			}
            },
            "image": {
			"@type": "ImageObject",
			"url": "https://space-warriors.com/frontend/web/img/blog/blogPost/' . $pos["id"] . '.jpg",
			"height": "209",
			"width": "209"
			}
		}';
unset($first_comma);
}
			
echo '
			]
  }  
</script>';
?>
<div class="flex flex-column" style="min-height:20vh">

  <div class="flex-auto sm-flex">
    <main class="flex-auto p2">
      <h1  class="mt0">База знаний: Все статьи</h1>
      <div class="clearfix mxn2">
    <div class="sm-col sm-col-12 md-col-12 px2">
   
<amp-live-list 
  layout="container"
  data-poll-interval="15000"
  data-max-items-per-page="20"
  id="amp-live-list-insert-blog">

  <button id="live-list-update-button"
    update on="tap:amp-live-list-insert-blog.update"
    class="ampstart-btn caps">
    Добавлены новые публикации, обновите страницу
  </button>

    
    <div items>
  <?php 
    foreach($blogposts as $post) { ?>
			
        <div 
            id="<?=$post['id'];?>"
            data-sort-time="<?=date("YmdHms", $post["created_at"])?>"
            data-update-time="<?=date("YmdHms", $post["created_at"])?>"
            >
     
        <div class="ampstart-card m1 blog">
        <div class="p2 bg-white border rounded">
       <?php if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $post['id'] . substr($post['banner'], -4))) {
		   ?>
	<amp-img src="<?php echo 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $post['id'] . substr($post['banner'], -4);?>"
          alt="<?=$post['banner']?>"
          layout="responsive"
          width="400"
          height="300">
          
        </amp-img>
	   <?php } else { ?>
              
	<amp-img src="https://space-warriors.com/no_image.png"
          alt="no_image"
          layout="responsive"
          width="850"
          height="850">
        </amp-img>
    
    <?php } ?>          
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
</div>  
<?php  }?>
</div>
	  
  <div pagination>
    <nav aria-label="amp live list pagination">
      <ul class="pagination">
        
        
        <li>
          <a href="">Next</a>
        </li>
        
      </ul>
    </nav>
  </div>

</amp-live-list>	
</div>
    </div>
    </main>
    <nav class="flex-first border">
         <div class="p2 bg-silver">
            <h4 class="h3 m0">Теги</h4>
        </div>
        <div class="px2">
        <?= \yii\widgets\Menu::widget([
                            'items' => $tag_items,
                            'options' => [
                                'class' => 'list-reset'
                            ]
                        ]);
                        ?>
        </div>        
        
    </nav>
    <aside class="p2 border" style="width:25em">
      
        <div class="p2 bg-silver">
            <h4 class="h3 m0">Другие разделы</h4>
        </div>
                    <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'list-reset'
                           
                            ]
                        ]);
                        ?>
    
    </aside>
  </div>
</div>
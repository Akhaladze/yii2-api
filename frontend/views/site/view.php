<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

use akiraz2\blog\assets\AppAsset;
use akiraz2\blog\Module;
use akiraz2\blog\models\BlogPost;

//AppAsset::register($this);  // $this - представляет собой объект представления

$this->title = $post->title;
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => htmlentities($post->brief)
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => htmlentities($post->tags)
]);


if(Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => htmlentities($this->title),
        'description' => htmlentities($post->brief),
        'image' => $post->getImageFileUrl('banner'),
    ]);
}


$this->params['breadcrumbs'][] = [
    'label' => Module::t('blog', 'Blog'),
    'url' => ['default/index']
];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => htmlentities($post->brief)
]);

//Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => Url::to(['item1'], true)]);

if (isset($_GET['id'])) {
$BlogPost = BlogPost::findOne($_GET['id']);
$url_ = 'https://space-warriors/blog/?=' . $_GET['id'] . '-' . $BlogPost['slug'];
//Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $url_]);
}
?>


<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": "<?= $post->getAbsoluteUrl();?>",
    "headline": "<?= htmlentities($post->category->title);?>",
    "datePublished": "<?= date_format(date_timestamp_set(new DateTime(), $post->updated_at), 'c') ?>",
    "dateModified": "<?= date_format(date_timestamp_set(new DateTime(), $post->updated_at), 'c') ?>",
    "description": "<?= htmlentities($post->brief);?>",
    "author": {
      "@type": "Person",
      "name": "<?= htmlentities($post->user->username);?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "Space Warriors",
      "logo": {
        "@type": "ImageObject",
        "url": "https://space-warriors.com/logo.jpg",
        "width": 600,
        "height": 60
      }
    },
    "image": {
      "@type": "ImageObject",
      "url": "https://space-warriors.com/frontend/web/img/blog/blogPost/thumb_<?=$post->id;?>.jpg?"
     // "height": 1024
     // "width": 100
    }
  }
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Главная",
    "item": "https://space-warriors.com/"
  },
  {
    "@type": "ListItem",
    "position": 2,
    "name": "<?= Html::encode($post->category->title); ?>",
    "item": "https://space-warriors.com/blog"
  },
  {
    "@type": "ListItem",
    "position": 3,
    "name": "<?= Html::encode($post->title); ?>",
    "item": "<?= Url::canonical(); ?>"
  }]
}
</script>


<section class="container px2 py3">
  
  <div class="clearfix mxn2">
    <div class="sm-col sm-col-8 md-col-9 px2">
    
    <article class="">
	<h3 class="h4 h4-responsive caps mt4 mb0 regular">Раздел: <?= htmlentities($post->category->title); ?></h4>
        <header class="center px1 py1 white bg-gray bg-cover bg-center">
		  <?php if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $post['id'] . substr($post['banner'], -4))) {
		?>
		<amp-img src="<?php echo 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $post['id'] . substr($post['banner'], -4);?>"
          layout="responsive"
          width="1024"
          height="536">
        </amp-img>
	   <?php	} else { ?>
	   
	   
	   <amp-img src="https://space-warriors.com/no_image.png"
          layout="responsive"
          width="850"
          height="850">
        </amp-img>
		
	   <?php }?>
	  
		</header> 
		 <p class="heading">
  <amp-social-share type="twitter"
    width="45"
    height="33"></amp-social-share>
  <amp-social-share type="facebook"
    width="45"
    height="33"
    data-attribution="254325784911610"></amp-social-share>
  <amp-social-share type="gplus"
    width="45"
    height="33"></amp-social-share>
  <amp-social-share type="email"
    width="45"
    height="33"></amp-social-share>

</p>
					
					<h1 class="h1 h0-responsive caps mt4 mb0 regular"><?= Html::encode($post->title); ?></h1>
				
	<time title="<?= Module::t('blog', 'Create Time'); ?>" itemprop="datePublished"
                  datetime="<?= date_format(date_timestamp_set(new DateTime(), $post->created_at), 'c') ?>">
                <i class="fa fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($post->created_at, 'long'); ?>
    </time>
	
	<p class=""><?=$post->brief;?></p>
	<p class=""><?=HtmlPurifier::process($post->content);?></p>
				 
<?php if ($post->module->enableComments) : ?>
   
	<section class="comments">
		<h2 class=""><?= Module::t('blog', 'Comments'); ?></h2>


        <ul class="list-reset">
           
              
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_comment',
                        'viewParams' => [
                        'post' => $post
                        ],
                    ]) ?>
            
		</ul>
		
		
			
                <?php /*
				<div class="col-md-5 col-md-offset-1">
                    <h3><?= Module::t('blog', 'Write comments'); ?></h3>
                    <?= $this->render('_form', [
                        'model' => $comment,
                    ]); ?>
                </div>
				
				*/?>
       

			<?php endif; ?>
		
    </section>
	
	
	
      </article>
    </div>
    <div class="sm-col sm-col-4 md-col-3 px2 sm-show">
      <h3 class="h4">Другие разделы</h3>
        <ul class="list-reset">
       
                    <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'list-unstyled'
                            //    'class' => 'list-unstyled'
                            ]
                        ]);
                        ?>
      </ul>
     </div>
	
	
	<div class="sm-col sm-col-4 md-col-3 px2 sm-show">
		<h3 class="h5">Популярные видео</h3>
	  
	  <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="xoOhh1LqslY">
		</amp-youtube>
	<br>
		 <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="yWnw0BrR7Ko">
		</amp-youtube>
		<br>
		 <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="kQt2WXoJyRc">
		</amp-youtube>
		
		<br>
		 <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="TJSjR-3Nd2U">
		</amp-youtube>

		<br>
		 <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="SbXiuxD6Yl0">
		</amp-youtube>
		
		<br>
		 <amp-youtube width="480"
	  height="270"
	  layout="responsive"
	  data-videoid="3yfpoPfPhvY">
		</amp-youtube>
		</div>
		
	</div>
	

</section>




    
	


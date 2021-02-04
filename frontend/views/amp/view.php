<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Html;

use akiraz2\blog\assets\AppAsset;
use akiraz2\blog\Module;
use akiraz2\blog\models\BlogPost;

//AppAsset::register($this);  // $this - представляет собой объект представления

$this->title = $post->title;
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => $post->brief
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => $this->title
]);

/*
if(Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => $this->title,
        'description' => $post->brief,
        'image' => $post->getImageFileUrl('banner'),
    ]);
}
*/

$this->params['breadcrumbs'][] = [
    'label' => Module::t('blog', 'Blog'),
    'url' => ['default/index']
];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => $post->brief
]);

//Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => Url::to(['item1'], true)]);

if (isset($_GET['id'])) {
$BlogPost = BlogPost::findOne($_GET['id']);
$url_ = 'https://space-warriors/blog/?=' . $_GET['id'] . '-' . $BlogPost['slug'];
Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $url_]);
}
?>
    <article class="recipe-article">
        <header>
		dsfsdfsd
          <span class="ampstart-subtitle block px3 pt2 mb2"><?= Module::t('blog', 'Category'); ?>
                : <?= Html::a($post->category->title, ['index', 'category_id' => $post->category->id], []); ?></span>
          <h1 class="mb1 px3"> <?= Html::encode($post->title); ?></h1>

  <!-- Start byline -->
  <section class="ampstart-byline clearfix mb4 px3 h5">
    
	<time title="<?= Module::t('blog', 'Create Time'); ?>" itemprop="datePublished"
                  datetime="<?= date_format(date_timestamp_set(new DateTime(), $post->created_at), 'c') ?>">
                <i class="fa fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($post->created_at, 'long'); ?>
    </time>
  </section>
  <!-- End byline -->
  
         <amp-img src="https://space-warriors.com/frontend/web/img/blog/blogPost/thumb_<?=$post->id;?>.jpg" 
					alt="<?= $post->title;?>" 
					width="200" height="200" layout="responsive">
			</amp-img>
        </header>
        <?php
            echo \yii\helpers\HtmlPurifier::process($post->content);
            ?>
        
	
      </article>
    
	

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": "<?= $post->getAbsoluteUrl();?>",
    "headline": "<?= $post->category->title;?>",
    "datePublished": "<?= date_format(date_timestamp_set(new DateTime(), $post->updated_at), 'c') ?>",
    "dateModified": "<?= date_format(date_timestamp_set(new DateTime(), $post->updated_at), 'c') ?>",
    "description": "<?= $post->brief;?>",
    "author": {
      "@type": "Person",
      "name": "<?= $post->user->username;?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "Space Warriors",
      "logo": {
        "@type": "ImageObject",
        "url": "https://space-warriors/sw.jpg",
        "width": 16,
        "height": 16
      }
    },
    "image": {
      "@type": "ImageObject",
      "url": "https://space-warriors.com/frontend/web/img/blog/blogPost/thumb_<?=$post->id;?>.jpg?",
      "height": 200,
      "width": 100
    }
  }
</script>


<?php if ($post->module->enableComments) : ?>
   
	<section class="recipe-comments">
		<h2 class="blog-comments__header title title--2"><?= Module::t('blog', 'Comments'); ?></h2>
        dfsdf
dfsdf
dfsdf
dfsdf
dfsdf
dfsdf
dfsdf
dfsdf
dfsdf
dfsdf

        <ul class="list-reset">
           
              
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_comment',
                        'viewParams' => [
                            'post' => $post
                        ],
                    ]) ?>
            
		</ul>
    </section>
			
                <?php /*
				<div class="col-md-5 col-md-offset-1">
                    <h3><?= Module::t('blog', 'Write comments'); ?></h3>
                    <?= $this->render('_form', [
                        'model' => $comment,
                    ]); ?>
                </div>
				
				*/?>
       
 <!-- comments -->

<?php endif; ?>
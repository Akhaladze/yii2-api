<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use common\widgets\Alert;
use cybercog\yii\googleanalytics\widgets\GATracking;
use akiraz2\blog\models\BlogPost;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html ⚡ lang="<?= Yii::$app->language ?>">
<head>
    <meta charset='<?= Yii::$app->charset ?>'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, minimum-scale=1, initial-scale=1'>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<script async custom-element="amp-live-list" src="https://cdn.ampproject.org/v0/amp-live-list-0.1.js"></script>
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<script custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js" async=""></script>
	
	<script async custom-element="amp-facebook-page" src="https://cdn.ampproject.org/v0/amp-facebook-page-0.1.js"></script>
	<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
	


	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
   
<style amp-custom="">/*! Basscss | http://basscss.com | MIT License */body{margin:0}amp-img{max-width:100%}svg{max-height:100%}fieldset,input,select,textarea{font-family:inherit;font-size:1rem;box-sizing:border-box;margin-top:0;margin-bottom:0}label{vertical-align:middle}input[type=date],input[type=datetime-local],input[type=datetime],input[type=email],input[type=month],input[type=number],input[type=password],input[type=search],input[type=tel],input[type=text],input[type=time],input[type=url],input[type=week]{height:2.25rem;padding:.5rem;vertical-align:middle;-webkit-appearance:none}select{line-height:1.75;padding:.5rem}select:not([multiple]){height:2.25rem;vertical-align:middle}textarea{line-height:1.75;padding:.5rem}table{border-collapse:separate;border-spacing:0;max-width:100%;width:100%}th{text-align:left;font-weight:700}td,th{padding:.25rem 1rem;line-height:inherit}th{vertical-align:bottom}td{vertical-align:top}body{line-height:1.5;font-size:100%}body,h1,h2,h3,h4,h5,h6{font-family:Helvetica Neue,Helvetica,sans-serif}h1,h2,h3,h4,h5,h6{font-weight:700;line-height:1.25;margin-top:1em;margin-bottom:.5em}dl,ol,p,ul{margin-top:0;margin-bottom:1rem}code,pre,samp{font-family:Source Code Pro,Consolas,monospace;font-size:inherit}pre{margin-top:0;margin-bottom:1rem;overflow-x:scroll}h1{font-size:2rem}h2{font-size:1.5rem}h3{font-size:1.25rem}h4{font-size:1rem}h5{font-size:.875rem}h6{font-size:.75rem}body{color:#111;background-color:#fff}a{color:#0074d9;text-decoration:none}a:hover{text-decoration:underline}code,pre{background-color:transparent;border-radius:3px}hr{border:0;border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:rgba(0,0,0,.125)}.field{border:1px solid rgba(0,0,0,.125);border-radius:3px}.field.is-focused,.field:focus{outline:none;border-color:#0074d9;box-shadow:0 0 0 2px rgba(0,116,217,.5)}.field.is-disabled,.field:disabled{background-color:rgba(0,0,0,.125);opacity:.5}.field.is-read-only,.field:-moz-read-only:not(select){background-color:rgba(0,0,0,.125)}.field.is-read-only,.field:read-only:not(select){background-color:rgba(0,0,0,.125)}.field.is-success{border-color:#2ecc40}.field.is-success.is-focused,.field.is-success:focus{box-shadow:0 0 0 2px rgba(46,204,64,.5)}.field.is-warning{border-color:#ffdc00}.field.is-warning.is-focused,.field.is-warning:focus{box-shadow:0 0 0 2px rgba(255,220,0,.5)}.field.is-error,.field:invalid{border-color:#ff4136}.field.is-error.is-focused,.field.is-error:focus,.field:invalid.is-focused,.field:invalid:focus{box-shadow:0 0 0 2px rgba(255,65,54,.5)}.table-light td,.table-light th{border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:rgba(0,0,0,.125)}.table-light tr:last-child td{border-bottom:0}.btn{font-family:inherit;font-size:inherit;font-weight:700;cursor:pointer;display:inline-block;line-height:1.125rem;padding:.5rem 1rem;margin:0;height:auto;border:1px solid transparent;vertical-align:middle;-webkit-appearance:none;color:inherit;background-color:transparent}.btn,.btn:hover{text-decoration:none}.btn:focus{outline:none;border-color:rgba(0,0,0,.125);box-shadow:0 0 0 3px rgba(0,0,0,.25)}::-moz-focus-inner{border:0;padding:0}.btn-primary{color:#fff;background-color:#0074d9;border-radius:3px}.btn-primary:hover{box-shadow:inset 0 0 0 20rem rgba(0,0,0,.0625)}.btn-primary:active{box-shadow:inset 0 0 0 20rem rgba(0,0,0,.125),inset 0 3px 4px 0 rgba(0,0,0,.25),0 0 1px rgba(0,0,0,.125)}.btn-primary.is-disabled,.btn-primary:disabled{opacity:.5}.btn-outline,.btn-outline:hover{border-color:currentcolor}.btn-outline{border-radius:3px}.btn-outline:hover{box-shadow:inset 0 0 0 20rem rgba(0,0,0,.0625)}.btn-outline:active{box-shadow:inset 0 0 0 20rem rgba(0,0,0,.125),inset 0 3px 4px 0 rgba(0,0,0,.25),0 0 1px rgba(0,0,0,.125)}.btn-outline.is-disabled,.btn-outline:disabled{opacity:.5}.h1{font-size:2rem}.h2{font-size:1.5rem}.h3{font-size:1.25rem}.h4{font-size:1rem}.h5{font-size:.875rem}.h6{font-size:.75rem}.font-family-inherit{font-family:inherit}.font-size-inherit{font-size:inherit}.text-decoration-none{text-decoration:none}.bold{font-weight:700}.regular{font-weight:400}.italic{font-style:italic}.caps{text-transform:uppercase;letter-spacing:.2em}.left-align{text-align:left}.center{text-align:center}.right-align{text-align:right}.justify{text-align:justify}.nowrap{white-space:nowrap}.break-word{word-wrap:break-word}.line-height-1{line-height:1}.line-height-2{line-height:1.125}.line-height-3{line-height:1.25}.line-height-4{line-height:1.5}.list-style-none{list-style:none}.underline{text-decoration:underline}.truncate{max-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.list-reset{list-style:none;padding-left:0}.inline{display:inline}.block{display:block}.inline-block{display:inline-block}.table{display:table}.table-cell{display:table-cell}.overflow-hidden{overflow:hidden}.overflow-scroll{overflow:scroll}.overflow-auto{overflow:auto}.clearfix:after,.clearfix:before{content:" ";display:table}.clearfix:after{clear:both}.left{float:left}.right{float:right}.fit{max-width:100%}.border-box{box-sizing:border-box}.align-baseline{vertical-align:baseline}.align-top{vertical-align:top}.align-middle{vertical-align:middle}.align-bottom{vertical-align:bottom}.m0{margin:0}.mt0{margin-top:0}.mr0{margin-right:0}.mb0{margin-bottom:0}.ml0{margin-left:0}.m1{margin:.5rem}.mt1{margin-top:.5rem}.mr1{margin-right:.5rem}.mb1{margin-bottom:.5rem}.ml1{margin-left:.5rem}.m2{margin:1rem}.mt2{margin-top:1rem}.mr2{margin-right:1rem}.mb2{margin-bottom:1rem}.ml2{margin-left:1rem}.m3{margin:2rem}.mt3{margin-top:2rem}.mr3{margin-right:2rem}.mb3{margin-bottom:2rem}.ml3{margin-left:2rem}.m4{margin:4rem}.mt4{margin-top:4rem}.mr4{margin-right:4rem}.mb4{margin-bottom:4rem}.ml4{margin-left:4rem}.mxn1{margin-left:-.5rem;margin-right:-.5rem}.mxn2{margin-left:-1rem;margin-right:-1rem}.mxn3{margin-left:-2rem;margin-right:-2rem}.mxn4{margin-left:-4rem;margin-right:-4rem}.mx-auto{margin-left:auto;margin-right:auto}.p0{padding:0}.p1{padding:.5rem}.py1{padding-top:.5rem;padding-bottom:.5rem}.px1{padding-left:.5rem;padding-right:.5rem}.p2{padding:1rem}.py2{padding-top:1rem;padding-bottom:1rem}.px2{padding-left:1rem;padding-right:1rem}.p3{padding:2rem}.py3{padding-top:2rem;padding-bottom:2rem}.px3{padding-left:2rem;padding-right:2rem}.p4{padding:4rem}.py4{padding-top:4rem;padding-bottom:4rem}.px4{padding-left:4rem;padding-right:4rem}.relative{position:relative}.absolute{position:absolute}.fixed{position:fixed}.top-0{top:0}.right-0{right:0}.bottom-0{bottom:0}.left-0{left:0}.z1{z-index:1}.z2{z-index:2}.z3{z-index:3}.z4{z-index:4}.lg-show,.md-show,.sm-show{display:none}@media (min-width:40em){.sm-show{display:block}}@media (min-width:52em){.md-show{display:block}}@media (min-width:64em){.lg-show{display:block}}@media (min-width:40em){.sm-hide{display:none}}@media (min-width:52em){.md-hide{display:none}}@media (min-width:64em){.lg-hide{display:none}}.display-none{display:none}.hide{position:height:1px;width:1px;overflow:hidden;clip:rect(1px,1px,1px,1px)}.container{max-width:64em;margin-left:auto;margin-right:auto}.col{float:left}.col,.col-right{box-sizing:border-box}.col-right{float:right}.col-1{width:8.33333%}.col-2{width:16.66667%}.col-3{width:25%}.col-4{width:33.33333%}.col-5{width:41.66667%}.col-6{width:50%}.col-7{width:58.33333%}.col-8{width:66.66667%}.col-9{width:75%}.col-10{width:83.33333%}.col-11{width:91.66667%}.col-12{width:100%}@media (min-width:40em){.sm-col{float:left;box-sizing:border-box}.sm-col-right{float:right;box-sizing:border-box}.sm-col-1{width:8.33333%}.sm-col-2{width:16.66667%}.sm-col-3{width:25%}.sm-col-4{width:33.33333%}.sm-col-5{width:41.66667%}.sm-col-6{width:50%}.sm-col-7{width:58.33333%}.sm-col-8{width:66.66667%}.sm-col-9{width:75%}.sm-col-10{width:83.33333%}.sm-col-11{width:91.66667%}.sm-col-12{width:100%}}@media (min-width:52em){.md-col{float:left;box-sizing:border-box}.md-col-right{float:right;box-sizing:border-box}.md-col-1{width:8.33333%}.md-col-2{width:16.66667%}.md-col-3{width:25%}.md-col-4{width:33.33333%}.md-col-5{width:41.66667%}.md-col-6{width:50%}.md-col-7{width:58.33333%}.md-col-8{width:66.66667%}.md-col-9{width:75%}.md-col-10{width:83.33333%}.md-col-11{width:91.66667%}.md-col-12{width:100%}}@media (min-width:64em){.lg-col{float:left;box-sizing:border-box}.lg-col-right{float:right;box-sizing:border-box}.lg-col-1{width:8.33333%}.lg-col-2{width:16.66667%}.lg-col-3{width:25%}.lg-col-4{width:33.33333%}.lg-col-5{width:41.66667%}.lg-col-6{width:50%}.lg-col-7{width:58.33333%}.lg-col-8{width:66.66667%}.lg-col-9{width:75%}.lg-col-10{width:83.33333%}.lg-col-11{width:91.66667%}.lg-col-12{width:100%}}.flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.flex-column{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.flex-wrap{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.flex-center{-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.flex-baseline{-webkit-box-align:baseline;-webkit-align-items:baseline;-ms-flex-align:baseline;align-items:baseline}.flex-stretch{-webkit-box-align:stretch;-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch}.flex-start{-webkit-box-align:start;-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start}.flex-end{-webkit-box-align:end;-webkit-align-items:flex-end;-ms-flex-align:end;align-items:flex-end}.flex-justify{-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between}.flex-auto{-webkit-box-flex:1;-webkit-flex:1 1 auto;-ms-flex:1 1 auto;flex:1 1 auto;min-width:0;min-height:0}.flex-grow{-webkit-box-flex:1;-webkit-flex:1 0 auto;-ms-flex:1 0 auto;flex:1 0 auto}.flex-none{-webkit-box-flex:0;-webkit-flex:none;-ms-flex:none;flex:none}.flex-first{-webkit-box-ordinal-group:0;-webkit-order:-1;-ms-flex-order:-1;order:-1}.flex-last{-webkit-box-ordinal-group:100000;-webkit-order:99999;-ms-flex-order:99999;order:99999}@media (min-width:40em){.sm-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}@media (min-width:52em){.md-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}@media (min-width:64em){.lg-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}.border{border:1px solid rgba(0,0,0,.125)}.border-top{border-top-style:solid;border-top-width:1px;border-top-color:rgba(0,0,0,.125)}.border-right{border-right-style:solid;border-right-width:1px;border-right-color:rgba(0,0,0,.125)}.border-bottom{border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:rgba(0,0,0,.125)}.border-left{border-left-style:solid;border-left-width:1px;border-left-color:rgba(0,0,0,.125)}.border-none{border:0}.rounded{border-radius:3px}.circle{border-radius:50%}.rounded-top{border-radius:3px 3px 0 0}.rounded-right{border-radius:0 3px 3px 0}.rounded-bottom{border-radius:0 0 3px 3px}.rounded-left{border-radius:3px 0 0 3px}.not-rounded{border-radius:0}.black{color:#111}.gray{color:#aaa}.silver{color:#ddd}.white{color:#fff}.aqua{color:#7fdbff}.blue{color:#0074d9}.navy{color:#001f3f}.teal{color:#39cccc}.green{color:#2ecc40}.olive{color:#3d9970}.lime{color:#01ff70}.yellow{color:#ffdc00}.orange{color:#ff851b}.red{color:#ff4136}.fuchsia{color:#f012be}.purple{color:#b10dc9}.maroon{color:#85144b}.color-inherit{color:inherit}.muted{opacity:.5}.bg-black{background-color:#111}.bg-gray{background-color:#aaa}.bg-silver{background-color:#ddd}.bg-white{background-color:#fff}.bg-aqua{background-color:#7fdbff}.bg-blue{background-color:#0074d9}.bg-navy{background-color:#001f3f}.bg-teal{background-color:#39cccc}.bg-green{background-color:#2ecc40}.bg-olive{background-color:#3d9970}.bg-lime{background-color:#01ff70}.bg-yellow{background-color:#ffdc00}.bg-orange{background-color:#ff851b}.bg-red{background-color:#ff4136}.bg-fuchsia{background-color:#f012be}.bg-purple{background-color:#b10dc9}.bg-maroon{background-color:#85144b}.bg-darken-1{background-color:rgba(0,0,0,.0625)}.bg-darken-2{background-color:rgba(0,0,0,.125)}.bg-darken-3{background-color:rgba(0,0,0,.25)}.bg-darken-4{background-color:rgba(0,0,0,.5)}.bg-lighten-1{background-color:hsla(0,0%,100%,.0625)}.bg-lighten-2{background-color:hsla(0,0%,100%,.125)}.bg-lighten-3{background-color:hsla(0,0%,100%,.25)}.bg-lighten-4{background-color:hsla(0,0%,100%,.5)}
</style>
	
	<?php if (isset($_GET['id'])) {
	if (isset($_GET['id'])) {
		$BlogPost = BlogPost::findOne($_GET['id']);
		$url_ = 'https://space-warriors/blog/' . $_GET['id'] . '-' . $BlogPost['slug'];
		//$url_ = 'https://space-warriors/blog/30-poleznye-ssylki-na-storonnie-resursy';
		Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $url_]);
		}
	
	 } else {
		 
			echo $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
			}?>

    <?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>


 
 <nav class="clearfix white bg-black">
  <div class="sm-col">
    <a href="/site/index" class="btn">Главная</a>
    <a href="/site/about" class="btn py2">О нас</a>
    <a href="/site/codex" class="btn py2">Кодекс</a>
    <a href="/blog" class="btn py2">База знаний</a>
    <a href="/site/contact" class="btn py2">Напишите нам!</a>
  </div>
  <div class="sm-col-right">
<?php  if (Yii::$app->user->isGuest) { ?>
        
		 <a href="/site/signup" class="btn py2">Signup</a>
		 <a href="/site/login" class="btn py2">Login</a>
		
<?php    } else { ?>

		 
		 <a href="/backend" class="btn py2">Админка</a>
		 <a href="site/logout" class="btn py2">Выйти (<?=Yii::$app->user->identity->username?>)</a>
		
<?php    } ?>
  
 </nav>
 
	<?php // echo  Breadcrumbs::widget([
         //   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
     //   ]); ?>
        <?php //Alert::widget() ?>
        <?= $content ?>
   
</div>

<footer class="p2 border">
   
        <p class='pull-left'>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y'); ?></p>
		
       
		<h3 class="h5">Мы в соцсетях</h3>
			<amp-facebook-page width="552"
				height="310"
				layout="responsive"
				data-hide-cover="true"
				data-href="https://www.facebook.com/spacewarriorscom/">
			</amp-facebook-page>
	</div>
        <p class='pull-right'> <a href = 'https://www.youtube.com/c/GeorgiyAkhaladze'>Больше полезных видео на нашем канале:</a></p>
   
</footer>


<amp-analytics type="googleanalytics">
<script type="application/json">
{
  "vars": {
    "account": "UA-119121537-2"
  },
  "triggers": {
    "trackPageview": {
      "on": "visible",
      "request": "pageview"
    }
  }
}
</script>
</amp-analytics>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

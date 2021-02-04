<?php
namespace frontend\view;
use Yii;
use yii\helpers\Html;

//var_dump($title);
//var_dump($category_id);
//var_dump($tags);
//die();

if (isset($_GET['tags'])) {$tags = $_GET['tags'];}

?>
<?php
/*
<amp-state 
	id="queries" 
	src="https://space-warriors.com/v1/search/search">
</amp-state>
*/
?>


<!-- Results Navbar -->


<div class="clearfix">

<div class="travel-no-focus flex-auto overflow-auto mt2" role="button" tabindex="-1" on="tap:AMP.setState({ui_filterPane: false, ui_reset: false, ui_sortPane: false})">

   
<div class="sm-col sm-col-7 md-col-8 lg-col-9">
	<div class="overflow-hidden rounded">
			<ul class="list-reset breadcrumbs">						
			<li class="inline-block breadcrumbs"><a href="https://space-warriors.com">Главная</a> </li>
<?php 
		if (isset($breadcrumbs) && !empty($breadcrumbs)) {
		//var_dump($breadcrumbs);
		
		//echo '!<br>';
		$crumb = $breadcrumbs;
	//	foreach ($breadcrumbs as $crumb) {
		while ($crumb) {
			echo '<li class="inline-block breadcrumbs pointer"> > </li>';
		//	print_r($breadcrumbs['item']);
		//	print_r($crumb);
		//	die();
		//	echo '<li class="inline-block breadcrumbs"><a href="https://space-warriors.com' . $crumb["item"] . '">' . $crumb['name'] . '</a> </li>';
			echo '<li class="inline-block breadcrumbs"><a href="https://space-warriors.com' . $crumb["item"]. '">' . $crumb['name'] . '</a> </li>';
			
			}	
				}?>
			</ul>
			
			
<amp-list 
			class="travel-inline-list travel-results-list"
			layout="flex-item" 
			noloading=""
			src="/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id . '';}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>" 
	
			[src]='"/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id . '';}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>"'>
			
			

		&nbsp;

<ul class="list-reset">

	<template type="amp-mustache">
	

					{{#seo_params}}
					<h1 class="posttitle"> {{title}} </h1>
					<h6 class="posttitle"> {{author}} </h1>
<h6 class="posttitle"> {{date}} </h1>
<hr>

					<?php $this->title = $title; ?>
					<?php 
					
					$this->registerMetaTag([
												'name' => 'description',
												'content' => htmlentities($description),
					]);
					$this->registerMetaTag([
												'name' => 'keywords',
												'content' => 'yii2, asterisk, linux, ibm',
					]);
					?>
					
					<div class="content"> {{{content}}} </div>
					{{/seo_params}}
									
</ul>	

{{#banner}}
    <amp-img src="{{banner}}"
		width="1600"
		height="900"
		class="content"
		layout="responsive">
	</amp-img>        
        
{{/banner}}
	
{{^banner}}
    <amp-img src="https://space-warriors.com/img/image1.jpg"
		width="1600"
		height="900"
		class="content"
		layout="responsive">
	</amp-img>
{{/banner}}
	<figcaption><?php echo $title?></figcaption>	

	</template>

		</amp-list>
</div>
<?php /* Шаблон для заполнения структурированных данных */

?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Главная",
    "item": "https://space-warriors.com"
  }
<?php 
if (isset($breadcrumbs) && !empty($breadcrumbs)) {
foreach ($breadcrumbs as $crumb) {?>
  ,{
    "@type": "ListItem",
    "position": <?=$crumb['position']?>,
    "name": "<?=$crumb['name']?>",
    "item": "https://space-warriors.com<?=$crumb['item']?>"
  }
<?php } }?>
  
  ]
}
</script>

<script type="application/ld+json">
   {
      "@context": "http://schema.org",
      "@type": "WebSite",
     
      "potentialAction":	{
        "@type": "SearchAction",
        "target": "https://space-warriors.com/v1/post/search/?tags={query}",
        "query-input": "required name=query"
      },
	 
	  "url": "https://space-warriors.com/<?php echo Yii::$app->request->url;?>"
			}
</script>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://space-warriors.com/<?php echo Yii::$app->request->url;?>"
  },
   "speakable":	{
		"@type": "SpeakableSpecification",
		"xpath": [
					"/html/head/meta[@name='title']/@content",
					"/html/head/meta[@name='description']/@content"
			]
	},
  
  "headline": "<?=htmlspecialchars($title)?>",
  
  "image": [
    "https://space-warriors.com/img/image1.jpg",
    "https://space-warriors.com/img/image2.jpg",
    "https://space-warriors.com/img/image3.jpg"

   ],
   
  "datePublished": "<?=$created_at?>",
  "dateModified":  "<?=$updated_at?>",
  "author": {
    "@type": "Person",
    "name": "Georgiy Akhaladze",
	"sameAs": [
    "hhttps://www.facebook.com/georgiy.akhaladze",
    "https://www.facebook.com/spacewarriorscom/",
    "https://linkedin.com/in/georgiy-akhaladze",
    "https://google.com/+GeorgiyAkhaladze",
    "https://github.com/Akhaladze",
    "https://www.youtube.com/c/GeorgiyAkhaladze"
  ]
  },
   "publisher": {
    "@type": "Organization",
    "name": "Space Warriors",
    "logo": {
      "@type": "ImageObject",
      "url": "https://space-warriors.com/logo.jpg"
    }
  },
  "description": "<?=htmlspecialchars($description);?>"
}
</script>


<!-- Results -->
<section class="travel-results pb1 md-pt1">
<hr>
<h3>Статьи по теме: </h3>
  <div class="max-width-3 mx-auto px1 md-px2 flex">

		<amp-list 
			class="travel-inline-list travel-results-list"
			layout="flex-item" 
			noloading=""
			src="/v1/post/search?
			<?php if(isset($tags)) 		{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>"
	
			[src]="'/v1/post/search?
			<?php if(isset($tags)) 		{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>'">
		
      <template type="amp-mustache">
        <div>
          <div class="flex flex-wrap mxn1 flex-auto">
            {{#results.length}}
              {{#results}}
              <div class="col-12 sm-col-6 lg-col-4 p1 travel-results-result">
                <div class="relative travel-results-result">
                  <a class="travel-results-result-link" href="{{url}}">
                    <amp-img class="rounded bg-silver mb1" width="2" height="1.4" noloading="" layout="responsive" src="{{img}}" srcset="{{img}}"></amp-img>
                    
                          <?php // <amp-img class="rounded bg-silver mb1" width="2" height="2" noloading="" layout="responsive" src="{{img}}" srcset="{{img}}></amp-img>?>   
                             
                    
                    
                  {{#flags.new}}
                  <div class="travel-results-result-flags absolute top-0 left-0">
                    <div class="p1"><span class="travel-pill bold">NEW</span></div>
                  </div>
                  {{/flags.new}}
                  
                  
                  <div class="travel-results-result-like absolute top-0 right-0">
                    <div class="p1">
                      <label class="travel-like">
                        {{#liked}}<input type="checkbox" checked="" class="absolute">{{/liked}}
                        {{^liked}}<input type="checkbox" class="absolute">{{/liked}}
                        <div class="travel-like-hearts circle inline-block relative">
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart travel-like-heart-white absolute mx-auto"></div>
                          <div class="travel-like-heart travel-like-heart-solid absolute mx-auto"></div>
                          <div class="travel-like-heart travel-like-heart-outline absolute mx-auto"></div>
                        </div>
                      </label>
                    </div>
                  </div>
                  
                </div>
                <div class="h2 line-height-2 mb1">
                  <span class="travel-results-result-text">{{name}}</span>
                  <span class="travel-results-result-subtext h3">&bull;</span>
                  <span class="travel-results-result-subtext h3">&#128065; &nbsp;</span><span class="bold">{{click}}</span>
                </div></a>
                <div class="h4 line-height-2">
                  <!--
                    Outputting SVG with amp-mustache is currently blocked. Plain
                    glyphs are used here instead for the map icon and rating.
                    see: https://github.com/ampproject/amphtml/issues/8214
                  -->
                  {{#reviews.count}}
                    <div class="inline-block relative mr1 h3 line-height-2">
                      <div>
                        <span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver"></span>
                      </div>
                      <div class="absolute top-0">
                        {{#reviews.averageRating.range}}<span class="travel-icon travel-img-icon-star-green"></span>{{/reviews.averageRating.range}}
                      </div>
                    </div>
                    <span class="travel-results-result-subtext mr1">{{reviews.count}} Reviews</span>
                  {{/reviews.count}}
                  {{^reviews.count}}
                    <span class="travel-results-result-subtext mr1">Нет отзывов</span>
                  {{/reviews.count}}
                    <span class="nowrap">
                     <span class="travel-results-result-subtext h4"> &#10001; </span>{{author}}
                    </span>
                  
                </div>
                    
              </div>
              {{/results}}
            {{/results.length}}
            {{^results.length}}
              <div class="travel-results-empty">
                <div>
                  <div class="h1 center mb1">
                    <span class="travel-icon travel-img-icon-sad-face-gray"></span>
                  </div>
                  <div class="h1 gray center">К сожалению ничего не нашлось</div>
                  <div class="gray center">
                    Вы можете
                    <span class="underline pointer" role="button" tabindex="0" on="
                        tap:
                          AMP.setState({ui_reset: false}),
                          AMP.setState({
                            ui_filterPane: true,
                            ui_reset: true,
                            query_user_id: fields_user_id_initial,
                            fields_user_id: fields_user_id_initial,
                            fields_user_id_edited: false,
                            query_category_id: fields_category_id_initial,
                            fields_category_id: fields_category_id_initial,
                            fields_category_id_edited: false
                          })
                      ">сбросить фильты</span>
                   и попробовать снова
                  </div>
                </div>
              </div>
            {{/results.length}}
          </div>
        </div>
		
      </template>
    </amp-list>
  </div>
</section>
<!--/ Results --> 
 </div>




<div class="sm-col sm-col-5 md-col-4 lg-col-3 mt2 p2" style="background-color: #ededed;">
<div class="overflow-hidden">
<amp-list 
			class="travel-inline-list travel-results-list"
			layout="flex-item" 
			noloading=""
			src="/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>"
	
			[src]="'/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>'">
		
	
<div class="bold border-bottom"> Смежные разделы 444 teete</div>	
<ul style="list-style:none">
	<template type="amp-mustache">
				{{#relatedcategories}}
						<a href="/{{redirect_url}}"><li class="" style="list-style:none">{{title}}</li></a>
				{{/relatedcategories}}
				{{^relatedcategories}}
					{{#allcategories}}
						<a href="/{{redirect_url}}"><li class="" style="list-style:none">{{title}}</li></a>
					{{/allcategories}}
				{{/relatedcategories}}	
	</template>
</ul>
</amp-list>
</div>
<br>
<div class="overflow-hidden">
		<amp-list 
			class="travel-inline-list travel-results-list"
			layout="flex-item" 
			noloading=""
			src="/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>"
	
			[src]="'/v1/post/search?
			<?php if(isset($tags)) 			{echo 'tags=' . $tags;}?>
			<?php if(isset($category_id)) 	{echo 'category_id=' . $category_id;}?>
			<?php if(isset($post_id)) 		{echo '&post_id=' . $post_id;}?>'">

		<div class="bold border-bottom mt2"> Теги </div> 
			<div class="pl1">
				<ul class="pl1 list-reset">
					<template type="amp-mustache">
						{{#tags}}
						<a href="/?tags={{name}}"><li class="inline-block mr1">{{name}}</li></a> 
						{{/tags}}
					</template>	
	     		</ul>
			</div>
		</amp-list>	
</div>
<br>

<div class="overflow-hidden">		
		<div class="bold border-bottom"> Вопросы и ответы </div> 
			<div class="p0">
				 <ul class="list-reset">
					<li>
						<div class="q_clasic">Leonid77
								
								<br>
								<span>02.05.2019</span>
								<br>
								<span>Question 1</span>
								<br>
								<span>10</span>
								<span>5</span>
						</div>
								
						<div class="mt1">Как проверить комп на вирусню. Вот чувствую что неправильно работает но как точно понять заражен или нет?</div>
					</li>			
				</ul>



				
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "QAPage",
    "mainEntity": {
      "@type": "Question",
      "name": "Leonid77",
      "text": "Как проверить комп на вирусню. Вот чувствую что неправильно работает но как точно понять заражен или нет?",
      "answerCount": 3,
      "upvoteCount": 2,
      "dateCreated": "2019-05-02T20:33Z",
      "author": {
        "@type": "Person",
        "name": "Leonid_77"
      },
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для нормальной проверки надо покупать антивирус, мне нравится ESET. Бесплатные антивирусы штука стремная. Да и не забывайте, об rootkit. В последнее время они очень помогают: chkrootkit например может проверять размеры файлов и сверяет их с данными репозитария. Fail2ban - может многое остановить.",
        "dateCreated": "2019-05-04T11:01Z",
        "upvoteCount": 4,
        "url": "https://space-warriors.com/bezopasnost/internet-bezopasnost/#q1a1",
        "author": {
          "@type": "Person",
          "name": "GNet"
        }
      },
      "suggestedAnswer": [
        {
          "@type": "Answer",
          "text": "Мне на работе дали ключик от каспера. Он вроде хороший антивирус",
          "dateCreated": "2019-05-03T01:22Z",
          "upvoteCount": 2,
          "url": "https://space-warriors.com/bezopasnost/internet-bezopasnost/#q1a2",
          "author": {
            "@type": "Person",
            "name": "dana_tr@ukr.net"
          }
        }, {
          "@type": "Answer",
          "text": "Лучше всегда пользоваться лиц. ПО. И не лазить по левым сайтам",
          "dateCreated": "2019-07-29T10:10Z",
          "upvoteCount": 4,
          "url": "https://space-warriors.com/bezopasnost/internet-bezopasnost/#q1a3",
          "author": {
            "@type": "Person",
            "name": "Akhaladze"
          }
        }
      ]
    }
  }
</script>
				</div>
			</div>
		</div>
	</div>
	
	<?php /* if(isset($tags)) echo $tags; */ ?>
</div>
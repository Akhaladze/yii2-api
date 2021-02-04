<?php
use yii\helpers\Url;
use yii\helpers\Html;

header('X-Frame-Options: GOFORIT'); 
?>

<head>
<meta name="X-Frame-Options" content="ALLOW-FROM http://my.otherdomain.com">
</head> 

<script type="application/ld+json">
{
      "@context": "http://schema.org",
      "@type": "WebSite",
      "url": "https://space-warriors",
        "potentialAction": {
        "@type": "SearchAction",
        "target": "https://space-warriors/v1/post/search&query={query}",
        "query-input": "required name=query"
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
    "item": "https://space-warriors.com"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "<?php echo $categor1;?>",
    "item": "https://space-warriors.com"
  }
  if()
  ,{
    "@type": "ListItem",
    "position": 3,
    "name": "Диваны",
    "item": "https://space-warriors.com"
  }]
}
</script>




<body>
<?php
// Короткое имя домена из админки disqus
$shortname = 'space-warriors';
 
// Ссылка на текущую страницу
$permalink = 'https://space-warriors.com/' . $_SERVER['REQUEST_URI'];
 
// Полный путь к disqus.php

// $path = 'https://cdn.space-warriors.com/index.shtml?disqus_url=' . urlencode( $permalink ) . '&disqus_shortname=' . urlencode( $shortname ) . '&disqus_identifier=' . urlencode( Url::canonical());
$path = 'https://cdn.space-warriors.com/dis/disqus.php?url=2gfdgdfg/fgdfg';

?>
<div>

<amp-iframe title="iframe Example 2"
	sandbox="allow-scripts allow-same-origin allow-modals allow-popups allow-popups-to-escape-sandbox"
	width="400" height="300"
    style="border:none"
    
	src="<?php echo $path?>">
			 
	<div overflow tabindex=0 role=button aria-label="">Дальше</div>
			
</amp-iframe>

</div>


<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "QAPage",
    "mainEntity": {
      "@type": "Question",
      "name": "Leonid77",
      "text": "Как проверить комп на вирусню. Вот чувствую что неправильно работает но как точно понять заражен или нет?",
      "answerCount": 1,
      "upvoteCount": 2,
      "dateCreated": "2019-05-02T20:33Z",
      "author": {
        "@type": "Person",
        "name": "Leonid_77"
      },
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для нормальной проверки надо покупать антивирус, мне нравится ESET. Бесплатные антивирусы штука стремная. Да и не забывайте, об rootkit чекерах. В последнее время они очень помогают: chkrootkit например может проверять размеры файлов и сверяет их с данными репозитария. Fail2ban - может многое остановить.",
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
          "dateCreated": "2019-05-03T10:10Z",
          "upvoteCount": 0,
          "url": "https://space-warriors.com/bezopasnost/internet-bezopasnost/#q1a3",
          "author": {
            "@type": "Person",
            "name": "ConfusedUser"
          }
        }
      ]
    }
  }
</script>

fgk;ldfkg;lkdf;lgkdf;lkg
dfgldfjgkljdflkg


dfgjdflkjglkdfj
</body>




<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;

//use yii\web\IdentityInterface;
//use common\models\User;
use akiraz2\blog\models\BlogPost;
use akiraz2\blog\models\BlogComment;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogTag;
use common\models\User;
use akiraz2\blog\models\BlogPostSearch;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\db\ActiveRecord;
//use yii\behaviors\TimeStampBehavior;
//use yii\base\Model;
//use yii\filters\auth\HttpBasicAuth;

class PostController extends ActiveController 

{

   
public $modelClass = 'akiraz2\blog\models\BlogPostSearch';

   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [ 
                                    'search'
                                    ,'index'				
							],
                        'allow' => true,
                   //   'roles' => ['?'],
                      
                    ],
                ],
            ],
			
			
						
		/*		
            'authenticator' => [			
            'class' => \yii\filters\auth\HttpBearerAuth::class,
            ],
        */
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                'search' => ['post','get'],
                'index' =>  ['post','get'],   
               
				],
            ],
		]
     );
 }


 
 public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => function () {
                 $searchModel = new BlogPostSearch();
                    return $searchModel->search(Yii::$app->request->queryParams);
                },
            ],
                        
        ];

    }
 

 
 public function actionSearch() {


	 $params = Yii::$app->request->queryParams;

        $query = BlogPost::find();
        
		$query->orderBy(['created_at' => SORT_DESC]);
        
		$query->andWhere(['blog_post.status' => 1])
              ->innerJoinWith('category')
              ->andWhere(['blog_category.status' => 1]);
	
		
		/*	
			Если к нам прилетел тег (теги)
			1. Найдем все посты с данными тегами (тегом); +
			2. Найдем все категории этих постов 
			3. Найдем все смежные теги
		*/

		if(isset($params['tags'])) {
		
		$tags = $params['tags'];
		$tags = BlogTag::string2array($tags);
		
		$query->FilterWhere(['or like', 'tags', $tags]);
		
		// var_dump($query);
		// die();
		
		}
		
		
		/*	
			Если к нам прилетела категория (категории)
			1. Найдем все посты относящиеся к категории; 
			2. Найдем все посты относящиеся к смещным категориям; 
			3. Найдем все категории этих постов
			4. Найдем все смежные теги
		*/

		
		
        if (isset($params['category_id'])) {
					$query->andFilterWhere([
							'category_id' => $params['category_id'],
							]);
			}  
	
       
		$posts = Yii::createObject([
			'class' => ActiveDataProvider::className(),
			'query' => $query,
			'pagination' => [
				'pageSize' => 100,
			],
    
		'sort' => [   
		'attributes' => [
           
            'sort' => [
                'asc' => ['click' => SORT_ASC, 'title' => SORT_ASC],
                'desc' => ['click' => SORT_DESC, 'title' => SORT_DESC],
                'default' => SORT_DESC,
                'label' => 'Popularity',
					],
				],
			 ],
		]);



	/* Результатом работы должно быть:
		1. Посты относящиеся к запросу пользователя: запрос по посту, запрос по категории, запрос по тегу
		2. Все категории
		3. Релевантные категории к запросу
		4. Релевантные теги к запросу
		   --
		5. Другая информация релевантная к запросу
	*/


	$posts = $posts->getModels();
	
	//	var_dump($posts);
	//	die();
	
	
	$relatedTags = '';
	$relatedPostCategoriesKeywords = '';
	$relatedCategoriesContent = '';
 	
	foreach ($posts as $post) {
		
    $rez_array['id']= $post['id'];
    $rez_array['name']= $post['title'];       
    
    if (file_exists('/var/www.beegee/practical-a/frontend/web/img/blog/blogPost/thumb_' . $post['id'] . substr($post['banner'], -4))) { 
			
			$rez_array['img']= 'https://space-warriors.com/frontend/web/img/blog/blogPost/' . $post['id'] . substr($post['banner'], -4);
			
	} else { 
              
			$rez_array['img']= "https://space-warriors.com/no_image.png";
	}
    
	$rez_array['url']= 'https://space-warriors.com/' . $post->category->redirect_url . '/' .$post['id'] . '-' . $post['slug'];
    $rez_array['click']= $post['click'];
    $rez_array['flags']['liked']= true;
    $rez_array['flags']['new']= true;
    $rez_array['tags'] = mb_strtoupper(str_replace(',',' ',$post['tags']));
    
	
	$relatedTags.= str_replace(', ', ',', trim($post['tags'])) . ',';
	
	
	$rez_array['reviews']['averageRating']['value']=4;
    $rez_array['reviews']['averageRating']['range'][]=true;
    $rez_array['reviews']['averageRating']['range'][]=true;
    $rez_array['reviews']['averageRating']['range'][]=true;
    $rez_array['reviews']['averageRating']['range'][]=true;
    
	
	/* Find and count comments for posts */
	
    $post_comments = BlogComment::find()->where(['post_id' => $post['id']])->count();
    (int) $post_comments_count = $post_comments;
    
	$rez_array['reviews']['count']= $post_comments_count;
    $category = BlogCategory::findOne($post['category_id']); 
	
	$rez_array['caterogy'] = $category['title'];
	$rez_array['category_id'] = $category['id'];
	
	$author = User::findOne($post['user_id']); 
    $rez_array['author']= $author['username'];
	
	$relatedCategoriesId[]	= $rez_array['category_id'];
	
	$relatedCategoriesContent .= $category['content'] . ' | ';

	(object)$rez_post[]=(array)$rez_array; 
	unset($rez_array);
    
	}
    
    

	
	// САМЫЕ ПОПУЛЯРНЫЕ ИЛИ РЕЛЕВАНТНЫЕ ТЕГИ
	
	$relatedTags = substr($relatedTags, 0, -1);
	
    $tags = BlogTag::find()
					->where('frequency >= 2')
					->andwhere(['or like', 'name', explode(',', $relatedTags)])
					->orderBy('frequency DESC')
					->all();
	
	foreach($tags as $tag){
        
        $tags_array[] = [
						'id'		=> $tag->id,
						'name'		=> $tag->name,
						'frequency'	=> $tag->frequency
					];
	$relatedPostCategoriesKeywords .= $tag->name . ', ';
	
    }
	

	
	// All Categories for stats
	
	$allcategories = BlogCategory::find()
						->where(['status'	=>1	]) 
						->Andwhere(['is_nav'	=>1	]) 
						->all(); 
    
	
	// All Relayted Categories for stats
	// || (isset($params['tags']))
	
	
	if (isset($params['category_id'])) {
			
		
		$current_page = BlogCategory::find()
						->select(['id', 'title', 'parent_id', 'content', 'redirect_url', 'keywords', 'banner','created_at', 'updated_at'])
						->where(['status'	=> 1 ])
						->Andwhere(['is_nav'=> 1 ])
						->Where(['id' => $params['category_id']])
						->asArray()
						->one();	
			
			
		$relatedcategories = BlogCategory::find()
						->select(['title', 'redirect_url', 'parent_id'])
						->where(['status'	=> 1 ]) 
						->Andwhere(['is_nav'=> 1 ])
						->andFilterWhere([
									'parent_id' => $params['category_id'],
								//	'id' => $parent_id->parent_id,
													])
						->orWhere(['parent_id' => $current_page['parent_id']])
						->orWhere(['id' => $current_page['parent_id']])
									
						->orFilterWhere(['id' => $params['category_id']])
						->asArray()
						->all();
		
		
	} else if (isset($params['tags'])) {
			
		$current_page 	= BlogCategory::find()
						->select(['id', 'title', 'parent_id', 'content', 'redirect_url', 'keywords', 'banner','created_at', 'updated_at'])
						->where(['status'	=> 1 ])
						->Andwhere(['is_nav'=> 1 ])
						->Where(['id' => $relatedCategoriesId])
						->asArray()
						->one();

		$current_page['title'] = 'По запросу: ' . $relatedPostCategoriesKeywords . '... Нам удалось найти! Статей: ' . count($posts) . ', Разделов: 4, Тематических тегов: 24, Коментариев: 1023';
		$current_page['content'] = $relatedCategoriesContent;
		$current_page['keywords'] = $relatedPostCategoriesKeywords;
		$current_page['banner'] = 'https://space-warriors.com/no_image.png';
		$current_page['created_at'] = Yii::$app->formatter->asDate(time(), 'php:c');
		$current_page['updated_at'] = Yii::$app->formatter->asDate(time(), 'php:c');

	
			
		$relatedcategories = BlogCategory::find()
						->select(['title', 'redirect_url', 'parent_id'])
						->where(['status'	=> 1 ]) 
						->Andwhere(['is_nav'=> 1 ])
						->AndWhere(['in', 'id', $relatedCategoriesId])
						->asArray()
						->all();
		
		
		
		}


	
	// Post by post_id
	
	if (isset($params['post_id'])) {
			
			$current_page = BlogPost::find()
							->select(['title', 'content', 'id', 'slug', 'banner', 'brief', 'created_at', 'updated_at'])
							->where(['status'	=> 1 ]) 
							->andFilterWhere(['id' => $params['post_id']])
							->asArray()
							->one();
	}

	if (!isset($current_page)) {
		
		$current_page[] = "";
		
	}


	
(array)$api_data = [
					'items'	=> [
									[
										'stats' => [
												
													'query'			=> ['yii2','rdp','linux'],  
													'resultCount'	=> count($posts)    
										]
										
	,'tags' => $tags_array 
	,'allcategories' => $allcategories
	,'relatedcategories' =>  (isset($relatedcategories) ? $relatedcategories : null)
	,'seo_params' => [ 
						[
	
	'title' 	=> (isset($current_page['title']) ? $current_page['title'] : "Добро пожаловать на Space Warriors!")
	
	,'content' 	=> (isset($current_page['content']) ? $current_page['content'] : "База заметок, рецептов, готовых решений. Лучшие материалы для ИТ-шников и просто любопытных пользователей. Первоначально проект был задуман как личный блог Георгия Ахаладзе, но позже к проэту примкнули и другие ИТ-специалисты. Мы надеемся, что материалы собранные на сайте помогут вам решить ваши задачи и разобраться в возникшех ситуациях. Если у вас есть вопрос - вы можете легко задать его соответсвующем разделе. Мы периодически повышаем юзабилити, и если вы нашли баг - смело пишите нам")
						]
	]

	,'banner' 	=> (isset($current_page['banner']) ? "https://space-warriors.com/frontend/web/img/blog/blogPost/" . $current_page['id'] . substr($current_page['banner'], -4) : "https://space-warriors.com/no_image.png")		
								
	,'created_at' => (isset($current_page['created_at'])) ? Yii::$app->formatter->asDate($current_page['created_at'], 'php:c') : Yii::$app->formatter->asDate(time(), 'php:c')
					
	,'updated_at' => (isset($current_page['updated_at'])) ? Yii::$app->formatter->asDate($current_page['updated_at'], 'php:c') : Yii::$app->formatter->asDate(time(), 'php:c')		
					
					
					,'comments' => ""		
					,'qa' => ""		
					,'results' => $rez_post
									]
					]
 ];

//	header("Content-Type: application/json");
	/*
	if($_SERVER[HTTP_ORIGIN] == "https://cdn.ampproject.org") {
    header('Access-Control-Allow-Origin: https://cdn.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	
	if($_SERVER['HTTP_ORIGIN'] == "https://space--warriors-com.ampproject.org") {
    header('Access-Control-Allow-Origin: https://space--warriors-com.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	
	if($_SERVER['HTTP_ORIGIN'] == "https://cdn.ampproject.org") {
    header('Access-Control-Allow-Origin: https://cdn.ampproject.org');
    header('Content-type: application/xml');
    readfile('arunerDotNetResource.xml');
	} 
	*/
	

	header("Access-Control-Allow-Origin: *");
	header("AMP-Same-Origin: true");
	header("Cache-Control: private, no-cache");
	header("Access-Control-Max-Age: 300");
    return $api_data;
 }



}


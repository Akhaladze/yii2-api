<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use akiraz2\blog\traits\IActiveStatus;
use akiraz2\blog\traits\ModuleTrait;
use akiraz2\blog\traits\StatusTrait;

//use common\models\Utnew;
//use common\models\Bpold;
//use common\models\DataMap;


use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use ActiveController;

use yii\widgets\ListView;
use \akiraz2\blog\Module;
//use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCommentSearch;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogComment;
use akiraz2\blog\models\BlogTag;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

/** 
 * Site controller
 */
class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'auth','signup','auth','compare', 'about', 'index', 'categories', 'codex', 'find'],
                'rules' => [
                    [
                        'actions' => ['signup','auth', 'about', 'index', 
						'categories', 'codex', 'find', 'view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'auth'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' 	=> ['post'],
                    'view' 		=> ['post', 'get'],
                    'index' 	=> ['post', 'get'],
                    'categories'=> ['post', 'get'],
                    'codex' 	=> ['post', 'get'],
                    'about' 	=> ['post', 'get'],
                    'find' 		=> ['post', 'get'],
                    'auth' 		=> ['post', 'get'],
                ],
            ],
        ];
    }


    public function actions()
    { 
		
        return [
			
			'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
            
			'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
			'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	/*Авторизация через соцсети */
		public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }
	
	


    public function actionIndex()
    {
        $this->layout = '@frontend/views/layouts/main_new.php';
           $category = BlogCategory::find()
								->where(['parent_id'=> 0
									,'is_nav'=>1
									,'status'=>1
									])
								->all();
           
        return $this->render('index',[
										'category' => $category,				
										]);
    }






/*	Category controller
	
	
*/

	public function actionCategory() 
    {

	$params = Yii::$app->request->queryParams;
	//Редирект для старых ссылок
		if (isset($params['id']) && preg_match("/blog/", $_SERVER['REQUEST_URI'])) {
		
		$current_post	= BlogPost::find()
						
						->where(['status'	=>	1])
						->andFilterWhere(['id' => $params['id']])		
						->one();
		
		$current_cat	= BlogCategory::find()
						
						->where([
								 'is_nav'		=> 1
								,'status'		=> 1
								])
						->andFilterWhere(['id' => $current_post['category_id']])
						->orderBy('parent_id ASC')
						->asArray()
						->one();
		$url = 'https://space-warriors.com/' . $current_cat['redirect_url'] . '/' . $current_post['id'] . '-' . $current_post['slug']; 
		return $this->redirect($url, 302);
		exit(1);
		
	}
	

    $this->layout = '@frontend/views/layouts/main_new.php';
        
 
	Yii::$app->view->registerJsFile('https://cdn.ampproject.org/v0/amp-selector-0.1.js', 
                                        
									['position' => yii\web\View::POS_HEAD,
                                     'async'=> "",
                                     'custom-element' => "amp-selector",
                                        ]);
		
	
	Yii::$app->view->registerJsFile('https://cdn.ampproject.org/v0/amp-iframe-0.1.js', 
								   ['position' => yii\web\View::POS_HEAD,
                                    'async'=> "",
                                    'custom-element' => "amp-iframe",
										]);
										
	Yii::$app->view->registerJsFile('https://cdn.ampproject.org/v0/amp-carousel-0.1.js', 
								   ['position' => yii\web\View::POS_HEAD,
                                    'async'=> "",
                                    'custom-element' => "amp-carousel",
										]);
	
	
	$item_count  = 1;
	$breadcrumbs = '';
	//object($breadcrumbs);
	 
	
	
	/*	Если это страница категории
		И страница корневая
	*/
	
	if(isset($params['tags'])) {

		$url_redirect = $params['tags'];
		
		/*	1. Найдем все посты с данными тегами (тегом); 
			2. Найдем все категории этих постов
			3. Найдем все смежные теги
			
		*/
		
		
		
		$tags = $params['tags'];
		
		
		
		$payload= [
				'category_id' 	=> 'cat_id',
				'post_id'		=> 'post_id',
				'title'			=> 'tag description',
				'description'	=> 'tag description',
				'tags'	=> $tags,
				
			//	'breadcrumbs'	=> $breadcrumbs,
				'created_at'	=> Yii::$app->formatter->asDate(time(), 'php:c'),
				'updated_at'	=> Yii::$app->formatter->asDate(time(), 'php:c')
		];
		
	}
	
	
	
	
	
	
	
	/*	Если это страница категории
		И страница корневая
	*/
	
	
	
	if(isset($params['cat1'])) {

		$url_redirect = $params['cat1'];
		
		$getcatinfo = BlogCategory::find()
						
						->where([
								'is_nav'		=> 1
								,'status'		=> 1
								])
						->andFilterWhere(['redirect_url' => $url_redirect])
						->orderBy('parent_id ASC')
						->asArray()
						->one();
		
		
		$item_count += 1;
		$breadcrumbs = array();
		$breadcrumbs = [
						'position'	=> $item_count,
						'name'	=> $getcatinfo['title'],
						'item'	=> '/' . $getcatinfo['redirect_url']
						
		];
		unset($getcatinfo);
		
	}
	
	/*	Если это страница категории
		И есть корневая + вложенная категория
		2 уровень
	*/
	
	
	if(isset($params['cat2'])) { 
		
		$url_redirect = $params['cat1'] . '/' . $params['cat2'];
		$getcatinfo = BlogCategory::find()
						
						->where([
								'is_nav'		=> 1
								,'status'		=> 1
								])
						->andFilterWhere(['redirect_url' => $url_redirect])
						->orderBy('parent_id ASC')
						->asArray()
						->one();
		
		
		$item_count += 1;
		$breadcrumbs = array();
		$breadcrumbs = [
						'position'	=> $item_count,
						'name'		=> $getcatinfo['title'],
						'item'		=> '/' . $getcatinfo['redirect_url']
						
		];
		unset($getcatinfo);

	}
	
	if(isset($url_redirect)) {
		
	$category = BlogCategory::find()
						
						->where([
								'is_nav'		=> 1
								,'status'		=> 1
								])
						->andFilterWhere(['redirect_url' => $url_redirect])
						->orderBy('parent_id ASC')
						->asArray()
						->one();

	//	Если текужая страница - категория;

		$payload= [
				
				'category_id' 	=> $category['id'],
				'title'			=> $category['title'],
				'description'	=> $category['content'],
				'breadcrumbs'	=> $breadcrumbs,
				'created_at'	=> Yii::$app->formatter->asDate($category['updated_at'], 'php:c'),
				'updated_at'	=> Yii::$app->formatter->asDate($category['updated_at'], 'php:c')
				
				];

	
		
	
	// Если текущая страница - запись из блога

	 if ((isset($params['id']) ) && (isset($params['cat1']) || isset($params['cat2']))) {
		
		
		$id = $params['id'];
		
		$post = BlogPost::find()
						
						->where([
								'status'		=> 1
								])
						->andFilterWhere(['id' => $id])		
						->one();
		
		$category = BlogCategory::find()
						->select('id')
						->where([
								 'is_nav'		=> 1
								,'status'		=> 1
								])
					//	->andFilterWhere(['id' => $id])				
						->one();
		
		$item_count += 1;
		$breadcrumbs[$item_count] = [
						'position'	=> $item_count,
						'name'		=> $post->title,
						'item'		=> '/' . $url_redirect . '/' . $post['id'] . '-' . $post['slug']
						
	];
		
		
	
		$payload= [
				'category_id' 	=> $post->category_id,
				'post_id'		=> $post->id,
				'title'			=> $post->title,
				'description'	=> $post->brief,
				'breadcrumbs'	=> $breadcrumbs,
				'created_at'	=> Yii::$app->formatter->asDate($post->created_at, 'php:c'),
				'updated_at'	=> Yii::$app->formatter->asDate($post->updated_at, 'php:c')
		];
				
				}
				
				} 		
		
	/*	Если это главная страница
	*/
	
		else {
			
			$payload= [
				
				'title'			=> 'Главная страница сообщества Space-Warriors',
				'keywords'		=> 'Space-Warriors, yii2, ibm, amp, linux, seo',
				'description'	=> 'База заметок, рецептов, мнений и готовых решений. Лучшие материалы для ИТ-шников и просто любопытных пользователей',
				'breadcrumbs'	=> $breadcrumbs,
				'created_at'	=> Yii::$app->formatter->asDate(time(), 'php:c'),
				'updated_at'	=> Yii::$app->formatter->asDate(time(), 'php:c')
	
			];
				
				
				}
				
//var_dump($breadcrumbs);
//die();	
		
		
		return $this->render('find', $payload);
    }
     
   
   
   
   /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
    
	 
	 
	 
	 
    public function actionView($id)
    {
        $post = BlogPost::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'id' => $id])->one();
        if ($post === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $post->updateCounters(['click' => 1]);

        $searchModel = new BlogCommentSearch();
        $searchModel->scenario = BlogComment::SCENARIO_USER;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
		$categories = BlogCategory::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'is_nav' => BlogCategory::IS_NAV_YES])
            ->orderBy(['sort_order' => SORT_ASC])->all();
         
        $tags = BlogTag::find()
            ->orderBy(['frequency' => SORT_DESC])->all(); 
        
        $tag_items = ArrayHelper::toArray($tags, [
            'akiraz2\blog\models\BlogTag' => [
                'label' => 'name',
                'url' => function ($tag) {
                    return ['/?tags[]=', 'tag_id' => $tag->id];
                },
            ],
        ]);    
        $cat_items = ArrayHelper::toArray($categories, [
            'akiraz2\blog\models\BlogCategory' => [
                'label' => 'title',
                'url' => function ($cat) {
                    return ['/' . $cat->redirect_url];
                },
            ],
        ]);
		
		

        $comment = new BlogComment();
        $comment->scenario = BlogComment::SCENARIO_USER;

         $fields = Yii::$app->request->get();
        
         if(isset($fields['author'])) 
            {
          
            $comment->author = $fields['author'];
            $comment->email = $fields['email'];        
            $comment->content = $fields['content'];

        if ($post->addComment($comment)) {
           // Yii::$app->session->setFlash('success', Module::t('blog', 'A comment has been added and is awaiting validation'));
            
            //return $this->redirect(['view', 'id' => $post->id, '#' => $comment->id]);
            return $this->redirect('/blog/' . $post->id .'-' . $post->slug . '#' . $comment->id);
        }
        
        }
        
        Yii::$app->view->params['cat_items'] = $cat_items;
        Yii::$app->view->params['tag_items'] = $tag_items;
		
		$this->layout = '@frontend/views/layouts/main_new.php';

        return $this->render('view', [
            'post' => $post,
            'dataProvider' => $dataProvider,
            'comment' => $comment,
            'cat_items' => $cat_items
        ]);
    }	  
	 
	 
	 */
	 
	 
    public function actionFind()
    {
        $this->layout = '@frontend/views/layouts/main_new.php';
      //  $this->layout = '@frontend/views/layouts/main_new_find.php';

        Yii::$app->view->registerJsFile('https://cdn.ampproject.org/v0/amp-selector-0.1.js', 
                                        ['position' => yii\web\View::POS_HEAD,
                                         'async'=> "",
                                         'custom-element' => "amp-selector",
                                        ]);
		
        
        $category = BlogCategory::find()->where(['parent_id'=> 0
						,'is_nav'=>1
						,'status'=>1
						])->all();
     
        
        return $this->render('find',[
				'category' => $category,				
				'category_id' => 7,				
				'cat1' => "",				
				'cat2' => "",				
				]);
    }



/*****************************************************************************************************************/

    /**
     * Displays codex.
     *
     * @return mixed
     */
	 
    public function actionCodex()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
        return $this->render('codex',[
										'model' => 'model',
									]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
		
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
		
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
		$this->layout = '@frontend/views/layouts/main_new.php';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
		
		
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
		
		
		
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	
	/**
     * Output RSS.
     *
     * @return RSS Channels Data
     */
	 
    public function actionRss()
    {
		
		$this->layout = '@app/views/layouts/rss.php';
		/*
		$dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \akiraz2\blog\models\BlogPost::find()
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
            'pageSize' => 10
            ],
        ]);

        $response = Yii::$app->getResponse();
        $headers = $response->getHeaders();

        $headers->set('Content-Type', 'application/rss+xml; charset=utf-8');

        $response->content = \Zelenin\yii\extensions\Rss\RssView::widget([
            'dataProvider' => $dataProvider,
            
			
			'channel' => [
                'title' => 'База Знаний::Только проверенные решения и удобные примеры',
                'link' => Url::toRoute('/', true),
                'description' => 'В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!',
                'language' => Yii::$app->language
            ],
            'items' => [
                'title' => function ($model, $widget) {
                        return $model->title;
                    },
                'description' => function ($model, $widget) {
                        return StringHelper::truncateWords($model->brief, 50);
                    },
                'link' => function ($model, $widget) {
                        return Url::toRoute(['blog/view', 'id' => $model->id, 'slug' => $model->slug], true);
                    },
                'guid' => function ($model, $widget) {
                        return Url::toRoute(['blog/view', 'id' => $model->id, 'slug' => $model->slug], true);
                    },
                'pubDate' => function ($model, $widget) {
                        $date = \DateTime::createFromFormat('U', $model->created_at);
                        return $date->format(DATE_RSS);
                    },
            ]
        ]);
		*/
		
		
		/*
		$feed = new \sokolnikov911\YandexTurboPages\Feed;
		$channel = new \sokolnikov911\YandexTurboPages\Channel();
		
		$channel
			->title('База Знаний::Только проверенные решения и удобные примеры')
			->link('https://space-warriors.com')
			->description('В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!')
			->language(Yii::$app->language)
			->appendTo($feed);
			
			
			$dataProvider = new \yii\data\ActiveDataProvider([
				'query' => \akiraz2\blog\models\BlogPost::find()
						->orderBy(['created_at' => SORT_DESC]),
						
				'pagination' => [
				'pageSize' => 10
				],
			]);
			
			$posts = $dataProvider->getModels();
			
			foreach ($posts as $post)  
				{
						$turboHeader = new \sokolnikov911\YandexTurboPages\TurboContentHeader();
						$turboHeader
							->titleH1($post['title'])
							->titleH2($post['brief'])
							->img('https://space-warriors.com/frontend/web/img/blog/blogPost/15.jpg');
							
							
					
								   
						
						$item = new \sokolnikov911\YandexTurboPages\Item();
						$item
							->title($post['title'])			
						//	->link('blog/view/?' . $post['id'] . '-' . $post['slug'])
						//	->link('https://space-warriors.com/blog/view?id=15&slug=dobavlaem-yandex-turbo-pages-v-yii2')
							->author($post->user->username)
							->category($post->category->title)
							->turboContent($turboHeader->asHTML() . $post['content'])
							->pubDate($post['created_at'])
							->appendTo($channel);

				}
				
				return $this->render('rss', [
												'feed' => $feed,
											]);

		*/									
			$dataProvider = new \yii\data\ActiveDataProvider([
				'query' => \akiraz2\blog\models\BlogPost::find()
						->orderBy(['created_at' => SORT_DESC]),
						
				'pagination' => [
				'pageSize' => 100
				],
			]);
		
			$posts = $dataProvider->getModels();
											
$feed = new \sokolnikov911\YandexTurboPages\Feed();
$channel = new \sokolnikov911\YandexTurboPages\Channel();
$channel
    ->title('База Знаний::Только проверенные решения и удобные примеры')
	->link('https://space-warriors.com')
	->description('В нашем блоге Вы найдете информацию о том как работать с Yii2, научитесь реальным примерам использования Kali Linux и kali NetHunter, узнаете тонкости настройки телефонии при помощи Asterisk, узнаете много нового о дополнительных функциях OС Windows и Linux. И помните - мы на белой стороне!')
	->language(Yii::$app->language)	
   // ->adNetwork(\sokolnikov911\YandexTurboPages\Channel::AD_TYPE_YANDEX, 'RA-123456-7', 'first_ad_place')
    ->appendTo($feed);

$googleCounter = new \sokolnikov911\YandexTurboPages\Counter(\sokolnikov911\YandexTurboPages\Counter::TYPE_GOOGLE_ANALYTICS, 'UA-119121537-2');
$googleCounter->appendTo($channel);
$yandexCounter = new \sokolnikov911\YandexTurboPages\Counter(\sokolnikov911\YandexTurboPages\Counter::TYPE_YANDEX, 50986358);
$yandexCounter->appendTo($channel);


foreach ($posts as $post)  
				{
$item = new \sokolnikov911\YandexTurboPages\Item();
// Item with enabled turbo mode

$turboHeader = new \sokolnikov911\YandexTurboPages\TurboContentHeader();
						$turboHeader
							->titleH1($post['title'])
							->titleH2($post['brief'])
							->img('https://space-warriors.com/frontend/web/img/blog/blogPost/15.jpg');


$item
    ->title($post['title'])
    ->link(Url::toRoute(['blog/view', 'id' => $post['id']], true))
	->author($post->user->username)
	->category($post->category->title)
	->turboContent($turboHeader->asHTML() . htmlspecialchars_decode ($post['content']))
	->pubDate($post['created_at'])
    ->appendTo($channel);
//$relatedItemsList = new \sokolnikov911\YandexTurboPages\RelatedItemsList();
//$relatedItem = new \sokolnikov911\YandexTurboPages\RelatedItem('Related article 1', 'http://www.example.com/related1.html');
//$relatedItem->appendTo($relatedItemsList);
//$relatedItem = new \sokolnikov911\YandexTurboPages\RelatedItem('Related article 2', 'http://www.example.com/related2.html',
//    'http://www.example.com/related2.jpg');
//$relatedItem->appendTo($relatedItemsList);
//$relatedItemsList
//    ->appendTo($item);
				}
	

return $feed;											
											
									
    }
	
/* 
	
	public function onAuthSuccess($client)
    {
        $attributes = $client->getUserAttributes();

       
        $auth = Auth::find()->where([
            'source' => $client->getId(),
            'source_id' => $attributes['id'],
        ])->one();
        
        if (Yii::$app->user->isGuest) {
            if ($auth) { // авторизация
                $user = $auth->user;
                Yii::$app->user->login($user);
            } else { // регистрация
                if (isset($attributes['email']) && User::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "Пользователь с такой электронной почтой как в {client} уже существует, но с ним не связан. Для начала войдите на сайт использую электронную почту, для того, что бы связать её.", ['client' => $client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    $user = new User([
                        'username' => $attributes['login'],
                        'email' => $attributes['email'],
                        'password' => $password,
                    ]);
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();
                    $transaction = $user->getDb()->beginTransaction();
                    if ($user->save()) {
                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $client->getId(),
                            'source_id' => (string)$attributes['id'],
                        ]);
                        if ($auth->save()) {
                            $transaction->commit();
                            Yii::$app->user->login($user);
                        } else {
                            print_r($auth->getErrors());
                        }
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // Пользователь уже зарегистрирован
            if (!$auth) { // добавляем внешний сервис аутентификации
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }
	
*/ 

	


	
	
	

}

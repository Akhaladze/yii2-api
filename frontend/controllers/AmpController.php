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

use yii\helpers\Url;
use yii\helpers\StringHelper;

use yii\widgets\ListView;
use \akiraz2\blog\Module;
use \akiraz2\blog\assets\AppAsset;
use akiraz2\blog\models\BlogCategory;
use akiraz2\blog\models\BlogPost;

use app\components\AuthHandler;

/**
 * OLD AMP controller
 */
class AmpController extends Controller
{
  

   
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionView()
    {
       if ($_GET['id']) {
           //$post = new BlogPost;
           $post = BlogPost::findOne($_GET['id']);
        return $this->redirect('https://space-warriors.com/blog/' . $post->id . '-' . $post->slug);
       } else {
		   return $this->redirect('https://space-warriors.com');
	   }
    }

  
}

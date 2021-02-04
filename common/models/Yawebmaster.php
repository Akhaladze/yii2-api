<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Yawebmaster extends ActiveRecord 
{
    
	 
    public static function tableName()
    {
        return '{{%yawebmaster_url}}';
    }

    /**
     * @inheritdoc
     */
   

   
}

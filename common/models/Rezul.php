<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Ms extends ActiveRecord 
{
    
	 
    public static function tableName()
    {
        return '{{%ms}}';
    }

    /**
     * @inheritdoc
     */
   

   
}

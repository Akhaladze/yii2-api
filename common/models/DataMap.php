<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class DataMap extends ActiveRecord 
{
    
	 
    public static function tableName()
    {
        return '{{%DataMap}}';
    }


   
}

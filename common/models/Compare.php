<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Utnew extends ActiveRecord 
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%utnew}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

   
}

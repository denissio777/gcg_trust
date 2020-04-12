<?php
namespace app\modules\admin\models;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Settings extends ActiveRecord
{

    public static function tableName()
    {
        return 'settings';
    }

    public function rules(){
        return [
            [['name', 'locale'], 'required'],
            [['name', 'locale', 'youtube', 'facebook', 'twitter', 'footer', 'instagram'], 'string'],
            ['locale', 'unique']
        ];
    }

    public static function get($locale, $key = false){
        if(!$key){
            return self::findOne(['locale' => $locale]);
        }else{
            return self::findOne(['locale' => $locale])->$key;
        }
    }

}
<?php
namespace app\modules\admin\models;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Categories extends ActiveRecord
{

    public static function tableName()
    {
        return 'videos';
    }

    public function rules(){
        return [
            [['title', 'slug', 'description'], 'required'],
            [['title', 'slug', 'description', 'youtube'], 'string'],
        ];
    }

    public static function get($slug, $key = false){
        if(!$key){
            return self::findOne(['slug' => $slug]);
        }else{
            return self::findOne(['slug' => $slug])->$key;
        }
    }

}
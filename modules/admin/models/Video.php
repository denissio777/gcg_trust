<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\modules\admin\controllers\VidController;


class Video extends ActiveRecord
{
    public $_flag;

    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['title', 'slug', 'description'], 'required'],
            [['title', 'slug', 'description'], 'string'],
            ['slug', 'unique'],
        ];
    }

    public static function getList(){
        $categories = self::find()->all();
        $array = [];
        foreach ($categories as $cat){
            $array[$cat->slug] = $cat->title;
        }
        return $array;
    }

    public static function get($slug, $key = false){
        if(!$key){
            return self::findOne(['slug' => $slug]);
        }else{
            return self::findOne(['slug' => $slug])->$key;
        }
    }

}
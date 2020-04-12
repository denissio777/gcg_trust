<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 05.07.18
 * Time: 12:19
 */

namespace app\modules\admin\models;


use app\models\Helper;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Page extends ActiveRecord
{

    public static function tableName()
    {
        return 'pages';
    }

    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['title', 'locale', 'content', 'meta_title', 'meta_description', 'keywords', 'slug', 'head_scripts', 'body_scripts', 'anchor'], 'string'],
            [['index', 'follow', 'home_page', 'hide'], 'boolean'],
            ['slug', 'unique']
        ];
    }

    public static function getAll(){
        $pages = Page::find()->all();
        $arr = [];
        foreach ($pages as $page){
            $arr[$page->id] = $page->title;
        }
        return $arr;
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            if (!$this->locale) $this->locale = 'en';
        }

        $regex = [
            '/[^а-яА-Яa-zA-Z0-9#]/' => '-',
            '/[!@$%^&*;(),.?":{}|<>]/' => '-',
            '/ /' => '-'
        ];
        $this->slug = preg_replace(array_keys($regex), $regex, $this->slug);
        $this->head_scripts = strip_tags($this->head_scripts);
        $this->body_scripts = strip_tags($this->body_scripts);

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public static function getLayouts(){
        return [
            'index' => 'Video',
            'main' => 'Rectangles'
        ];
    }

}
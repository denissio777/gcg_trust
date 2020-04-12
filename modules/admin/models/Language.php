<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class Language extends ActiveRecord
{
    public $_flag;

    public static function tableName()
    {
        return 'langs';
    }

    public function rules()
    {
        return [
            [['name', 'locale', 'original'], 'required'],
            [['name', 'locale', 'original', 'flag'], 'string'],
            ['locale', 'unique'],
        ];
    }

    public static function getList(){
        $langs = self::find()->all();
        $array = [];
        foreach ($langs as $lang){
            $array[$lang->locale] = $lang->name;
        }
        return $array;
    }

    public static function getListOriginal(){
        $langs = self::find()->all();
        $array = [];
        foreach ($langs as $lang){
            $array[$lang->locale] = $lang->original;
        }
        return $array;
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            $copy = Settings::findOne(['locale' => 'en']);
            $new = new Settings();
            $new->attributes = $copy->attributes;
            $new->locale = $this->locale;
            $new->save(false);

            $pages = Page::find()->where(['locale' => 'en'])->all();
            foreach ($pages as $record) {
                $new_model = new Page();
                $new_model->attributes = $record->attributes;
                $new_model->locale = $this->locale;
                $new_model->slug = $record->slug.'-'.$this->locale;
                $new_model->save(false);
            }

            $posts = Post::find()->where(['locale' => 'en'])->all();
            foreach ($posts as $record) {
                $new_model = new Post();
                $new_model->attributes = $record->attributes;
                $new_model->locale = $this->locale;
                $new_model->slug = $record->slug.'-'.$this->locale;
                $new_model->save(false);
            }

            $faqs = Faq::find()->where(['locale' => 'en'])->all();
            foreach ($faqs as $record) {
                $new_model = new Faq();
                $new_model->attributes = $record->attributes;
                $new_model->locale = $this->locale;
                $new_model->save(false);
            }
        }
        return parent::beforeSave($insert);
    }

}
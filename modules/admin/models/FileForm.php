<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 22.01.18
 * Time: 16:05
 */

namespace app\modules\admin\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FileForm extends Model
{

    /**
     * @var UploadedFile[]
     */

    public $files;

    public function rules()
    {
        return [
            [['files'], 'file', 'extensions' => 'jpg, gif, png, pdf, xls, csv, xlsx, txt, doc, docx', 'maxFiles' => 10],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            foreach ($this->files as $file){
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
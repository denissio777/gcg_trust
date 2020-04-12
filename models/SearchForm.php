<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 01.09.18
 * Time: 15:11
 */

namespace app\models;


use yii\base\Model;

class SearchForm extends Model
{
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string']
        ];
    }

}
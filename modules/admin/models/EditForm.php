<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 07.07.18
 * Time: 23:37
 */

namespace app\modules\admin\models;


use yii\base\Model;

class EditForm extends Model
{
    public $string;

    public function rules()
    {
        return [
            ['string', 'string']
        ];
    }

}
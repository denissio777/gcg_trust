<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 05.07.18
 * Time: 12:19
 */

namespace app\models;
use yii\db\ActiveRecord;

class Analytics extends ActiveRecord{

    public static function tableName()
    {
        return 'areas';
    }

    public function rules()
    {
        return [
            [['user_id','timestamp'], 'integer'],
            [['area'], 'string']
        ];
    }

}
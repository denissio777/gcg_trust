<?php

namespace app\models;

use app\modules\admin\models\Settings;
use app\modules\admin\models\Site;
use SendGrid;
use Yii;
use yii\base\Model;
use app\models\Analytics;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $timestamp;
    public $shift;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['timestamp', 'shift'], 'required'],
            ['timestamp', 'integer'],
            ['shift', 'integer', 'max' => 3600],
        ];
    }

    public function getRecords() {
        if($this->validate()){
            $timestamp = $this->timestamp;
            $shift = $this->shift;
            $start = $timestamp - $shift;
            $end = $timestamp + $shift;
            $records = Analytics::find()->where(['between', 'timestamp', $start, $end])->orderBy(['id' => SORT_ASC])->all();
            $arr = array();
            foreach ($records as $key => $item) {
                $arr[$item['user_id']][$key] = $item;
            }
            ksort($arr, SORT_NUMERIC);
            return $arr;
        } else {
            return false;
        }
    }


}

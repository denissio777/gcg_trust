<?php

namespace app\models;

use app\modules\admin\models\Settings;
use SendGrid;
use Yii;
use yii\helpers\BaseStringHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $index_text
 * @property string $about_text
 * @property string $blog_text
 * @property string $contact_text
 * @property string $logo
 */
class Request extends \yii\db\ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'requests';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'subject', 'text'], 'required'],

            [
                [
                    'name', 'subject'
                ],
                'string', 'max' => 64
            ],

            [
                [
                    'phone', 'skype', 'ip'
                ],
                'string', 'max' => 32
            ],
            [
                'email', 'email'
            ],
            [
                'status', 'integer'
            ],
            [
                'text', 'string'
            ],
            ['verifyCode', 'captcha']

        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'message',
            'verifyCode' => 'Verification Code',
        ];
    }

    public function beforeSave($insert)
    {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->status = 0;

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public static function sendMail($senderEmail, $sender, $subject, $to, $text){
        $from = new SendGrid\Email($senderEmail, $sender);
        $to = new SendGrid\Email(substr($to, 0, strpos($to, "@")), $to);
        $content = new SendGrid\Content("text/html", $text);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);
        $sg->client->mail()->send()->post($mail);
    }

}
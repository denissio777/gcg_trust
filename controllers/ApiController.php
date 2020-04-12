<?php

namespace app\controllers;

use app\models\Analytics;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\rest\Controller;
use yii\web\Response;

class ApiController extends Controller
{

    public function behaviors()
    {
        return [];
    }

    public function init()
    {
        parent::init();
        header('Access-Control-Allow-Origin: *');
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    public function actionClick(){
        if(Yii::$app->request->isAjax) {
            $uid = Yii::$app->request->post('uid');
            $area = Yii::$app->request->post('area');
            $timestamp = date('U');

        $model = new Analytics();

        // TODO : SAVE TO DATABASE
        $model->user_id = $uid;
        $model->area = $area;
        $model->timestamp = $timestamp;
        $model->save();

        return [
            'uid' => $uid,
            'area' => $area,
            'timestamp' => $timestamp,
            'model' => $model
        ];
        }
    }

}

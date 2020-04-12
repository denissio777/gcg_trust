<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models\Navigation;
use app\modules\admin\models\Slider;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class NavigationController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();
        Yii::$app->errorHandler->errorAction = 'admin/main/error';
    }

    public function actions()
    {
        $this->layout = 'main';
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        $models = Navigation::find()->all();
        return $this->render('index',[
            'models' => $models,
        ]);
    }



    public function actionCreate(){
        $model = new Navigation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Navigation successfully created!');
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Navigation::findOne($id);
        if (!$model) throw new NotFoundHttpException('Record not found');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Navigation successfully updated!');
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        Navigation::findOne($id)->delete();
        Yii::$app->getSession()->setFlash('update', 'Navigation successfully deleted!');
        return $this->redirect(\Yii::$app->request->getReferrer());
    }

}
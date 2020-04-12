<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class PageController extends Controller
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
        $query = Page::find()->orderBy(['title' => SORT_ASC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);
        $models = $dataProvider->getModels();
        $count = $dataProvider->getTotalCount();
        $pagination = $dataProvider->pagination;
        return $this->render('index',[
            'models' => $models,
            'count' => $count,
            'pagination' => $pagination
        ]);
    }

    public function actionSearch($title){
        $query = Page::find()->where(['like', 'title', $title])->orderBy(['title' => SORT_ASC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);
        $models = $dataProvider->getModels();
        $count = $dataProvider->getTotalCount();
        $pagination = $dataProvider->pagination;
        return $this->render('index',[
            'models' => $models,
            'count' => $count,
            'pagination' => $pagination
        ]);
    }

    public function actionCreate(){
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Page successfully created!');
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Page::findOne($id);
        if (!$model) throw new NotFoundHttpException('Record not found');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Page successfully updated!');
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        $nav = Navigation::find()->where(['like', 'pages', $id])->all();
        foreach ($nav as $n){
            $pages = explode(', ', $n->pages);
            $key = array_search($id, $pages);
            unset($pages[$key]);
            $pages = implode(', ', $pages);
            $n->pages = $pages;
            $n->save(false);
        }
        Page::findOne($id)->delete();
        Yii::$app->getSession()->setFlash('update', 'Page successfully deleted!');
        return $this->redirect(\Yii::$app->request->getReferrer());
    }

    public function actionGet(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pages = Page::find()->all();
        $arr = [];
        foreach ($pages as $page){
            $arr[] = [
                'id' => $page->id,
                'name' => $page->title
            ];
        }
        return $arr;
    }

}
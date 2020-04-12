<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use app\modules\admin\models\Settings;
use app\modules\admin\models\Categories;
use app\modules\admin\controllers\VidController;
use app\modules\admin\models\Site;
use app\modules\admin\models\SiteSettings;
use app\modules\admin\models\Pages;
use app\modules\admin\models\Faq;
use app\modules\admin\models\FaqTopic;
use app\modules\admin\models\Post;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class CategoriesController extends Controller
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

    public function beforeAction($action)
    {
        if (!Site::get('language_module_enabled')) throw new ForbiddenHttpException('Module disabled. Enable first');
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
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
        $query = Categories::find();
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
        $model = new Categories();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('video', 'Video successfully created!');
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Categories::findOne($id);
        if (!$model) throw new NotFoundHttpException('Record not found');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Video successfully updated!');
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id){
        $cat = Categories::findOne($id);
        Categories::findOne(['title' => $cat->title])->delete();
        $pages = Page::find()->where(['title' => $cat->slug])->all();
        foreach ($pages as $page) {
            $page->delete();
        }
        $posts = Post::find()->where(['slug' => $cat->slug])->all();
        foreach ($posts as $post) {
            $post->delete();
        }
        $cat->delete();
        Yii::$app->getSession()->setFlash('cat', 'Video successfully deleted!');
        return $this->redirect('index');
    }
}
<?php

namespace app\modules\admin\controllers;

use app\models\AboutPage;
use app\models\ContactPage;
use app\models\DescriptionPage;
use app\models\Helper;
use app\models\HomePage;
use app\models\ProjectsPage;
use app\models\ServicesPage;
use app\modules\admin\models\AboutItem;
use app\modules\admin\models\Account;
use app\modules\admin\models\AdvItem;
use app\modules\admin\models\BlockItem;
use app\modules\admin\models\Faq;
use app\modules\admin\models\FaqTopic;
use app\modules\admin\models\Footer;
use app\modules\admin\models\Forex;
use app\modules\admin\models\Lang;
use app\modules\admin\models\Language;
use app\modules\admin\models\Video;
use app\modules\admin\models\Vid;
use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use app\modules\admin\models\Pages;
use app\modules\admin\models\Payment;
use app\modules\admin\models\Platform;
use app\modules\admin\models\Post;
use app\modules\admin\models\Project;
use app\modules\admin\models\Service;
use app\modules\admin\models\Categories;
use app\modules\admin\models\Site;
use app\modules\admin\models\SiteSettings;
use app\modules\admin\models\SliderItem;
use app\modules\admin\models\Testimonials;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class VidController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
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

    public function actionIndex()
    {
        $categories = Video::find()->all();
        $count = count($categories);
        return $this->render('index',[
            'categories' => $categories,
            'count' => $count
        ]);
    }

    public function actionCreate(){
        $model = new Video();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('slug', 'Category successfully created!');
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Video::findOne($id);
        if (!$model) throw new NotFoundHttpException('Record not found');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('slug', 'Category successfully updated!');
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id){
        $cat = Video::findOne($id);
        Video::findOne(['slug' => $cat->slug])->delete();
        $pages = Page::find()->where(['slug' => $cat->slug])->all();
        foreach ($pages as $page) {
            $page->delete();
        }
        $posts = Post::find()->where(['slug' => $cat->slug])->all();
        foreach ($posts as $post) {
            $post->delete();
        }
        $cat->delete();
        Yii::$app->getSession()->setFlash('cat', 'Category successfully deleted!');
        return $this->redirect('index');
    }

}
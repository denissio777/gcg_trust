<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 08.10.17
 * Time: 14:42
 */

namespace app\modules\admin\controllers;


use app\models\Purchase;
use app\models\Transaction;
use app\modules\admin\models\EditForm;
use app\modules\admin\models\FileForm;
use app\modules\admin\models\Request;
use app\modules\admin\models\Site;
use app\modules\admin\models\Style;
use dektrium\user\filters\AccessRule;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;

class MainController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
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
        ];
    }

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionStyle(){
        $style = Style::findOne(1);
        if ($style->load(Yii::$app->request->post()) && $style->save()) {
            Yii::$app->getSession()->setFlash('update', 'Style successfully updated!');
            return $this->refresh();
        }
        return $this->render('style', [
            'style' => $style
        ]);
    }

    public function actionRequests(){
        $models = Request::find()->orderBy(['date' => SORT_DESC])->all();
        return $this->render('requests', [
            'models' => $models
        ]);
    }

    public function actionDelete($id){
        Request::findOne($id)->delete();
        Yii::$app->getSession()->setFlash('flash', 'Request successfully deleted!');
        return $this->redirect(\Yii::$app->request->getReferrer());
    }

    public function actionCheck($id){
        $request = Request::findOne($id);
        $request->status = 1;
        $request->save();
        Yii::$app->getSession()->setFlash('flash', 'Request successfully checked!');
        return $this->redirect(\Yii::$app->request->getReferrer());
    }

    public function actionFiles(){
        $model = new FileForm();
        $files = scandir(Yii::$app->basePath.'/web/uploads');
        unset($files[0]);
        unset($files[1]);

        if (Yii::$app->request->isPost) {
            shell_exec('sudo chown -R ubuntu:www-data '.Yii::$app->basePath.'/web/uploads');
            $model->files = UploadedFile::getInstances($model, 'files');
            if ($model->upload()) {
                Yii::$app->getSession()->setFlash('update', 'Files was successfully uploaded!');
                return $this->redirect(\Yii::$app->request->getReferrer());
            }
        }
        else {
            return $this->render('files', [
                'model' => $model,
                'files' => $files
            ]);
        }
    }

    public function actionCss(){
        $model = new EditForm();
        $model->string = file_get_contents(Yii::$app->basePath.'/web/css/custom.css');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $css = fopen(Yii::$app->basePath.'/web/css/custom.css', "w");
            fwrite($css, $model->string);
            fclose($css);
            Yii::$app->getSession()->setFlash('update', 'CSS successfully updated!');
            return $this->redirect(Yii::$app->request->getReferrer());
        } else {
            return $this->render('css', [
                'model' => $model,
            ]);
        }
    }

    public function actionSettings(){
        $model = Site::findOne(1);
        $model->robots = file_get_contents(Yii::$app->basePath.'/web/robots.txt');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Settings successfully updated!');
            return $this->refresh();
        }
        return $this->render('settings', [
            'model' => $model
        ]);
    }

    public function actionDeletefile($file){
        if (Yii::$app->request->isPost) {
            shell_exec('sudo chown -R ubuntu:www-data '.Yii::$app->basePath.'/web/uploads');
            unlink(Yii::$app->basePath.'/web/uploads/'.$file);
            Yii::$app->getSession()->setFlash('update', 'File successfully deleted!');
            return $this->redirect(Yii::$app->request->getReferrer());
        }
    }

}
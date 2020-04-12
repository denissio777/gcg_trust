<?php

use app\models\SearchForm;
use app\modules\admin\models\Faq;
use app\modules\admin\models\Post;
use app\modules\admin\models\Service;
use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

$this->title = $model->title.' | '.Settings::get($locale, 'name');
$this->registerMetaTag(['name' => 'title', 'content' => $model->meta_title]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);
if($model->index && $model->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
}
if($model->index && !$model->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, nofollow']);
}
if(!$model->index && $model->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow']);
}
if(!$model->index && !$model->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
}

$shortcodes = [
    '[[CONTACT_FORM]]',
    '[[BLOG]]',
    '[[FAQ]]'
];

foreach ($shortcodes as $shortcode){
    if (strpos($model->text, $shortcode) !== false){
        switch ($shortcode){
            case '[[CONTACT_FORM]]':
                $model->text = str_replace($shortcode, $this->render('_contact_form', [
                    'model' => $contact_form,
                    'translator' => $translator
                ]), $model->text);
                break;
            case '[[BLOG]]':
                $query = Post::find()->where(['locale' => $locale, 'hide' => 0]);
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
                $search_form = new SearchForm();
                $model->text = str_replace($shortcode, $this->render('_blog', [
                    'models' => $models,
                    'translator' => $translator,
                    'count' => $count,
                    'pagination' => $pagination,
                    'search_form' => $search_form
                ]), $model->text);
                break;
            case '[[FAQ]]':
                $faqs = Faq::find()->where(['locale' => $locale])->all();
                $model->text = str_replace($shortcode, $this->render('_faq', [
                    'faqs' => $faqs,
                    'locale' => $locale
                ]), $model->text);
                break;
        }
    }
}

?>
<?php if (Yii::$app->session->hasFlash('contact')){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?=Alert::widget([
                    'type' => Alert::TYPE_INFO,
                    'titleOptions' => ['icon' => 'info-sign'],
                    'body' => Yii::$app->session->getFlash('contact')
                ]);?>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?=Html::img('@web'.$model->img, ['style' => 'max-width: 400px; float: left; margin: 0 5px 5px 0;'])?>
            <?=$model->text?>
        </div>
    </div>
</div>

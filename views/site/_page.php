<?php

use app\models\SearchForm;
use app\modules\admin\models\Faq;
use app\modules\admin\models\Post;
use app\modules\admin\models\Service;
use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

$this->title = $page->title.' | '.Settings::get($locale, 'name');
$this->registerMetaTag(['name' => 'title', 'content' => $page->meta_title]);
$this->registerMetaTag(['name' => 'description', 'content' => $page->meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
if($page->index && $page->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
}
if($page->index && !$page->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, nofollow']);
}
if(!$page->index && $page->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow']);
}
if(!$page->index && !$page->follow){
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
}

$this->registerJs($page->head_scripts, \yii\web\View::POS_HEAD);
$this->registerJs($page->body_scripts, \yii\web\View::POS_END);

$shortcodes = [
    '[[CONTACT_FORM]]',
    '[[BLOG]]',
    '[[FAQ]]'
];

foreach ($shortcodes as $shortcode){
    if (strpos($page->content, $shortcode) !== false){
        switch ($shortcode){
            case '[[CONTACT_FORM]]':
                $page->content = str_replace($shortcode, $this->render('_contact_form', [
                    'model' => $contact_form,
                    'translator' => $translator
                ]), $page->content);
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
                $page->content = str_replace($shortcode, $this->render('_blog', [
                    'models' => $models,
                    'translator' => $translator,
                    'count' => $count,
                    'pagination' => $pagination,
                    'search_form' => $search_form
                ]), $page->content);
                break;
            case '[[FAQ]]':
                $faqs = Faq::find()->where(['locale' => $locale])->all();
                $page->content = str_replace($shortcode, $this->render('_faq', [
                    'faqs' => $faqs,
                    'locale' => $locale
                ]), $page->content);
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

<?=$page->content?>

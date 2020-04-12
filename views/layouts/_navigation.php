<?php

use app\modules\admin\models\Language;
use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use app\modules\admin\models\Site;
use app\modules\admin\models\Style;
use dektrium\user\models\User;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\web\JqueryAsset;

$flag = Language::findOne(['locale' => $this->params['lang']])->flag;
$navigation = Navigation::find()->where(['locale' => $this->params['lang'], 'in_footer' => 0])->orderBy(['position' => SORT_ASC])->limit(6)->all();
$items = [];
foreach ($navigation as $nav){
    if ($nav->anchor){
        $items[] = ['label' => $nav->title, 'url' => '#', 'linkOptions' => ['data-target' => $nav->anchor, 'class' => 'scrollTo']];
    }else{
        $sub_pages = array_filter(explode(', ', $nav->pages));
        if (count($sub_pages) == 1){
            $page = Page::findOne($sub_pages[0]);
            if (!$page->hide){
                if ($page->anchor){
                    $items[] = ['label' => $nav->title, 'url' => ['/site/index', 'slug' => $page->slug, '#' => $page->anchor]];
                    $items[] = ['label' => 'Videos', 'url' => ['/site/videos', 'slug' => $page->slug, '#' => $page->anchor]];
                }else{
                    $items[] = ['label' => $nav->title, 'url' => ['/site/index', 'slug' => $page->slug]];
                    $items[] = ['label' => 'Videos', 'url' => ['/site/videos', 'slug' => $page->slug]];
                }
            }
        }else{
            $sub_items = [];
            foreach ($sub_pages as $sub_page){
                $page = Page::findOne((int) $sub_page);
                if (!$page->hide){
                    if ($page->anchor){
                        $sub_items[] = ['label' => $page->title, 'url' => ['/site/index', 'slug' => $page->slug, '#' => $page->anchor]];
                    }else{
                        $sub_items[] = ['label' => $page->title, 'url' => ['/site/index', 'slug' => $page->slug]];
                    }
                }
            }
            $items[] = ['label' => $nav->title, 'items' => $sub_items];
        }
    }
}

$lang_items = [];
$langs = Language::find()->all();

foreach ($langs as $lang){
    $lang_items[] = ['label' => '<span class="flag-icon flag-icon-'.$lang->flag.'"></span>  '.strtoupper($lang->locale), 'url' => ['/site/switch', 'locale' => $lang->locale], 'linkOptions' => ['data' => ['method' => 'post']]];
}

$right_btns = [
    ['label' =>  '<span class="flag-icon flag-icon-'.$flag.'"></span>  '.strtoupper($language), 'items' => $lang_items, 'options' => ['class' => 'lang-dropdown'], 'visible' => Site::get('language_module_enabled')]
];

$auth_btns = [
    ['label' => '<i class="fas fa-sign-in-alt"></i> '.$translator->translate['login'], 'url' => ['/user/login'], 'visible' => Yii::$app->user->isGuest],
    ['label' => '<i class="fas fa-user-plus"></i> '.$translator->translate['register'], 'url' => ['/user/register'], 'visible' => Yii::$app->user->isGuest],
    ['label' => '<i class="fas fa-sign-out-alt"></i> '.$translator->translate['logout'], 'url' => ['/user/security/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => [
        'data' => [
            'method' => 'post'
        ]
    ]]
];


if (Yii::$app->modules['user']->enableRegistration){
    foreach ($auth_btns as $auth_btn){
        array_unshift($right_btns, $auth_btn);
    }
}
$navbar_class = 'navbar-inverse';
if(Style::get('fixed_navbar')){
    $navbar_class = 'navbar-inverse navbar-fixed-top';
//    $this->registerJsFile('@web/js/fixed-navbar.js', ['depends' => JqueryAsset::className()]);
}
?>

<?php
NavBar::begin([
    'brandLabel' => Style::get('logo'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => $navbar_class. ' clickable',
        'data-area'=> 'nav',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav '.Style::get('navbar_align')],
    'items' => $items,
]);

NavBar::end();
?>



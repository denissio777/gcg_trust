<?php

use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use app\modules\admin\models\Style;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\web\JqueryAsset;

AppAsset::register($this);

$language = $this->params['lang'];
$settings = $this->params['settings'];
$translator = $this->params['translator'];

if (Style::get('highlight_tab')){
    $this->registerJsFile('@web/js/activetab.js', ['depends' => JqueryAsset::className()]);
}

$this->registerCss('body{background-color: '.Style::get('background_color').';}');
$this->registerCss('.navbar-inverse{background-color: '.Style::get('navbar_color').'; border-color: '.Style::get('navbar_border_color').'}');
$this->registerCss('.dropdown-menu{background-color: '.Style::get('ddm_background').'; border: 1px solid '.Style::get('ddm_border').'}');
$this->registerCss('.dropdown-menu > li > a{color: '.Style::get('ddm_links').';}');
$this->registerCss('.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    color: '.Style::get('ddm_hover_text').';
    background-color: '.Style::get('ddm_hover_background').';
}');
$this->registerCss('.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
    color: '.Style::get('ddm_active').';
    background-color: '.Style::get('ddm_active_background').';
}');
$this->registerCss('.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    color: '.Style::get('active_link_color').';
    background-color: '.Style::get('active_link_background').';
}');
$this->registerCss('.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    color: '.Style::get('link_hover_color').';
    background-color: '.Style::get('link_hover_background').';
}');
$this->registerCss('.navbar-inverse .navbar-nav > li > a { color: '.Style::get('navbar_links_color').'; }');
$this->registerCss('.navbar-brand > img { max-width: '.Style::get('logo_width').'px; }');
if(Style::get('background_img')){
    $this->registerCss('body{background-image: url(/web'.Style::get('background').');}');
}

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Style::get('favicon')]);

if(Style::get('fixed_navbar') && Style::get('navbar_transition')){
    $this->registerCss('.opaque {
        background-color: '.Style::get('transition_color').';
        transition: background-color '.Style::get('transition_time').'s ease 0s;
    }');
    $this->registerJsFile('@web/js/scroll-navbar.js', ['depends' => JqueryAsset::className()]);
}

$this->registerCss('.footer ul > li > a {
    color: '.Style::get('footer_links_color').';
}');

$this->registerCss('.footer ul > li > a:hover {
    color: '.Style::get('footer_links_hover_color').';
}');

$this->registerCss('.socials a {
    color: '.Style::get('footer_social_links_color').';
}');

$this->registerCss('.footer small {
    color: '.Style::get('footer_text_color').';
}');

$this->registerCss('.navbar-inverse .navbar-toggle .icon-bar {
    background-color: '.Style::get('navbar_links_color').';
}');



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <?=$this->render('_navigation', [
        'translator' => $translator,
        'language' => $language
    ])?>

    <?= $content ?>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

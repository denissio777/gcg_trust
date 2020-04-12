<?php
use app\assets\DashboardAsset;
//use app\modules\admin\models\Request;
use app\modules\admin\models\Request;
use app\modules\admin\models\Settings;
use app\modules\admin\models\Site;
use app\modules\admin\models\Style;
use dektrium\user\models\Profile;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
$sitename = Settings::get('en', 'name');

$shorted = explode(' ', $sitename);
$logo_mini = '';
if (isset($shorted[1]) && isset($shorted[1][0])){
    $first = $shorted[0][0];
    $second = $shorted[1][0];
    $logo_mini = '<span class="logo-mini"><b>'.$first.'</b>'.$second.'</span>';
}else{
    $logo_mini = '<span class="logo-mini"><b>'.$shorted[0][0].'</b>'.$shorted[0][1].'</span>';
}

$user_id = Yii::$app->user->id;
DashboardAsset::register($this);
$requests = Request::find()->where(['status' => 0])->count();
if($requests > 0)$badge = '<span class="label label-success">'.$requests.'</span>';
else $badge = '';

$admin = Profile::findOne(Yii::$app->user->id);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Style::get('favicon')]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <header class="main-header">

       <?=Html::a($logo_mini.' <span class="logo-lg">'.$sitename.'</span>', ['/admin/main/index'], ['class' => 'logo'])?>

        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 20px;">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <i class="fas fa-bars"></i>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?=Html::img('@web/img/user.png', ['class' => 'user-image'])?>
                            <span class="hidden-xs"><?=$admin->name?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <?=Html::img('@web/img/user.png', ['class' => 'img-circle'])?>
                                <p>
                                    <?=$admin->name?> - Administrator
                                    <small><?=$sitename?></small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <?= Html::a('Settings', '#', ['class' => 'btn btn-default btn-flat'])?>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a('Logout', ['/user/logout'], ['class' => 'btn btn-default btn-flat', 'data' => ['method' => 'post']])?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fas fa-question-circle"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <?=Html::img('@web/img/user.png', ['class' => 'img-circle'])?>
                </div>
                <div class="pull-left info">
                    <p><?=$admin->name?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <div class="admin-nav">
                <?php
                NavBar::begin([
                    'brandLabel' => false,
                    'brandUrl' => false,
                    'options' => [
                        'id' => 'admin-nav',
                        'class' => 'admin-nav',
                    ],
                ]);?>
<?= Nav::widget([
                    'options' => ['class' => 'sidebar-menu'],
                    'encodeLabels' => false,
                    'items' => [
                        '<li class="header">Navigation</li>',
                        ['label' => '<i class="fas fa-cogs"></i> <span>Settings</span>', 'url' => ['/admin/main/settings']],
                        ['label' => '<i class="fas fa-paint-brush"></i> <span>Style</span>', 'url' => ['/admin/main/style']],
                        ['label' => '<i class="fas fa-language"></i> <span>Languages</span>', 'items' => [
                                ['label' => 'Languages', 'url' => ['/admin/lang/index']],
                                ['label' => 'Settings', 'url' => ['/admin/settings/index']]
                        ], 'visible' => Site::get('language_module_enabled')],
                        ['label' => '<i class="fas fa-cogs"></i> <span>Videos</span>', 'items' => [
                            ['label' => 'Categories', 'url' => ['/admin/vid/index']],
                            ['label' => 'Videos', 'url' => ['/admin/categories/index']]
                    ], 'visible' => Site::get('language_module_enabled')],
                        ['label' => '<i class="fas fa-file"></i> <span>Pages</span>', 'url' => ['/admin/page/index']],
                        ['label' => '<i class="fas fa-newspaper"></i> <span>Blog</span>', 'url' => ['/admin/blog/index'], 'visible' => Site::get('blog_module_enabled')],
                        ['label' => '<i class="fas fa-bars"></i> <span>Navigation</span>', 'url' => ['/admin/navigation/index']],
                        ['label' => '<i class="fas fa-question-circle"></i> <span>FAQ</span>', 'url' => ['/admin/faq/index'], 'visible' => Site::get('faq_module_enabled')],
                        ['label' => '<i class="fas fa-exclamation-circle"></i> <span>Requests</span> '.$badge, 'url' => ['/admin/main/requests']],
                        ['label' => '<i class="fab fa-css3-alt"></i> <span>CSS</span>', 'url' => ['/admin/main/css']],
                        ['label' => '<i class="fas fa-file-upload"></i> <span>Files</span>', 'url' => ['/admin/main/files']],
                        ['label' => '<i class="fas fa-users"></i> <span>Users</span>', 'url' => ['/user/admin/index'], 'visible' => Site::get('user_module_enabled')],
                    ],
                ]);?>
                <?php NavBar::end(); ?>
            </div>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content">

            <?=$content?>

        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <?=Html::a('Go to website', ['/'], ['target' => '_blank'])?>
        </div>
        <strong>Copyright &copy; <?=date('Y')?> <?=$sitename?></strong> All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fas fa-code"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fas fa-headset"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Shortcodes</h3>

                <div class="col-md-12">
                    <ul class="control-sidebar-menu">
                        <?php if (Site::get('faq_module_enabled')){?>
                            <li>
                                <code title="Render FAQ">[[FAQ]]</code>
                            </li>
                        <?php } ?>
                        <li>
                            <code title="Render contact form">[[CONTACT_FORM]]</code>
                        </li>
                        <li>
                            <code title="Render blog posts">[[BLOG]]</code>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
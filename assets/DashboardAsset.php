<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-blue.css',
        'css/dashboard.css',
        '/web/dashboard/css/select2.min.css',
        '/web/dashboard/css/dashboard.css',
    ];
    public $js = [
//        '/web/bootstrap/js/bootstrap.js',
        '/web/dist/js/app.js',
//        'js/jquery-ui-min.js',
        'web/dashboard/js/select2.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

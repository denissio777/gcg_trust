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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'css/custom.css',
        '//use.fontawesome.com/releases/v5.1.0/css/all.css',
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800',
        '/web/css/flags/css/flag-icon.min.css'
    ];
    public $js = [
        'js/main.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

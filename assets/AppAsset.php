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
    'css/fontello-codes.css',
    'css/fontello.css',
    'css/fontello-embedded.css',
    'css/bootstrap.css',
    'css/jquery.fancybox.css',
        'css/style.css',
        'css/animate.css',
        'css/animation.css',
    ];
    public $js = [
        'js/jquery.js',
    'js/bootstrap-filestyle.js',
    'js/jquery.fancybox.js',
    'js/script.js',
    'js/tether.js',
        'js/masonry.pkgd.js',
        'js/bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

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
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "public/css/bootstrap.min.css",
        "public/css/owl.carousel.css",
        "public/css/owl.theme.css",
        "public/css/magnific-popup.css",
        "public/css/style.css",
        "public/css/mystyle.css",
        "public/css/responsive.css",
        "public/css/font-awesome.min.css",
    ];
    public $js = [
        "public/js/html5shiv.min.js",
        "public/js/jquery-1.9.1.min.js",
        "public/js/jquery.appear.js",
        "public/js/bootstrap.min.js",
        "public/js/classie.js",
        "public/js/owl.carousel.min.js",
        "public/js/jquery.magnific-popup.min.js",
        "public/js/masonry.pkgd.min.js",
        "public/js/masonry.js",
        "public/js/smooth-scroll.min.js",
        "public/js/typed.js",
        "public/js/main.js",
    ];
    public $depends = [

    ];
}

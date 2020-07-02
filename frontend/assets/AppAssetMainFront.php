<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAssetMainFront extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       'css/mainfront.css'
     ];
    public $js = [
    //    'js/custom.js'
     ];
     public $depends = [
      'yii\web\YiiAsset',
     'yii\bootstrap4\BootstrapAsset',
     ];
}
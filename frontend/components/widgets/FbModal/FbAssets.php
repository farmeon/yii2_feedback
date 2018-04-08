<?php

namespace app\frontend\components\widgets\FbAssets;

use yii\web\AssetBundle;
class FbAssets extends AssetBundle
{
    public $sourcePath = '@frontend/components/widgets/FbModal/assets';
    public $css = [
        //'css/style.css'
    ];
    public $js = [
        'js/modal.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
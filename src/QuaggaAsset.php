<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;

class QuaggaAsset extends AssetBundle
{
    public $js = [
        'js/barcode.js',
        'js/quagga.min.js',
        'js/quagga_modal.js'
    ];

    public $css = [
        'css/quagga.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = "@jeffersoncarvalho/quagga/assets";
        parent::init();
    }
}

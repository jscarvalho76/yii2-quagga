<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;

class QuaggaAsset extends AssetBundle
{
    public $js = [
        'js/quagga.min.js',
        'js/leitor.js'
    ];

    public $css = [
        'css/quagga.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}
<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;

class QuaggaSubmitAsset extends AssetBundle
{
    public $js = [
        'js/quagga_submit.js'
    ];

    public $css = [

    ];

    public $depends = [

    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}
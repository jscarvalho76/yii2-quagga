<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;
use yii\base\Widget;

/**
 * This is just an example.
 */
class Quagga extends Widget
{
    public $id;

    public function run()
    {
        parent::init();
        QuaggaAsset::register($this->getView());
        if ($this->id === null) {
            $this->id = 'interactive';
        }
        return $this->video();
    }

    public function video()
    {
        $video = '<div id="'.$this->id.'" class="viewport interactive"></div>';
        return $video;
    }
}

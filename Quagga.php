<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;
use yii\base\Widget;
use yii\web\View;

/**
 * This is just an example.
 */
class Quagga extends Widget
{
    /**
     * @var type string idForm of the widget
     */
    protected $id;

    /**
     * @var type string input of the widget
     */
    protected $input;

    /**
     * @var type string action of the widget
     */
    public $action;


    public function run()
    {
        $view = $this->getView();

        QuaggaAsset::register($view);

        if ($this->input === null) {
            $this->input = 'scanner_input';
        }

        if ($this->id === null) {
            $this->id = 'leitorEan';
        }

        if ($this->action=== null) {
            $this->action = '/';
            QuaggaDefaultAsset::register($view);
        }else{
            QuaggaSubmitAsset::register($view);
        }

        return $this->video();

        //$view->registerJs("jQuery('{$this->target}').fancybox({$config});");
    }

    public function video()
    {
        return $this->render('ean',[
            'action' => $this->action,
            'id' => $this->id,
            'scanner_input' => $this->input,
        ]);
    }

}

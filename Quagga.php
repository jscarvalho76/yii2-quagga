<?php

namespace jeffersoncarvalho\quagga;

use yii\web\AssetBundle;
use yii\base\Widget;
use yii\web\View;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class Quagga extends Widget
{
    /**
     * @var type string idForm of the widget
     */
    public $id;

    /**
     * @var type string input of the widget
     */
    public $input;

    /**
     * @var type string action of the widget
     */
    public $action;
    
    /**
     * @var type array  action of the widget
     */
    public $config = [];

    /**
     * @var type boolean  action of the widget
     */
    public $submit = false;
    
    /**
     * @var type boolean  action of the widget
     */
    public $modal = true;
    
    /**
     * @var type string  action of the widget default post
     */
    public $method = 'post';

    public function run()
    {
        $view = $this->getView();

        QuaggaAsset::register($view);

        if ($this->input === null)
            $this->input = 'scanner_input';

        if ($this->id === null)
            $this->id = 'leitorEan';

        if ($this->action=== null)
            $this->action = '/';

        $config = Json::encode($this);

        $view->registerJs("let dataQuagga = {$config};", View::POS_BEGIN);

        return $this->video();
    }

    public function video()
    {
        return $this->render('_ready',[
            'model' => $this,
        ]);
    }
}

QuaggaJS
========
QuaggaJS

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jeffersoncarvalho/yii2-quagga "*"
```

or add

```
"jeffersoncarvalho/yii2-quagga": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

PHP
```php
<?php
    use jeffersoncarvalho\quagga\Quagga;
    use yii\helpers\Html;
    
    echo Html::textInput('result', '', ['class' => 'form-control', 'id'=>'result']);
    
    echo jeffersoncarvalho\quagga\Quagga::widget(); 
?>

```

JavaScript
```javascript
Quagga.onDetected(function(data){
    document.getElementById('result').value = data.codeResult.code;
});
```
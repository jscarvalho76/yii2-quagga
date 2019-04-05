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
   
    echo Quagga::widget(); 
?>

```

JavaScript
```javascript
Quagga.onDetected(function(data){
    console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
});
```
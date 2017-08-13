project extension for gamantha pao
==================================
project extension for gamantha pao

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run --> nap

```
php composer.phar require --prefer-dist gamantha/project "*"
```

or add

```
"gamantha/project": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \vendor\gamantha\pao\project\AutoloadExample::widget(); ?>```
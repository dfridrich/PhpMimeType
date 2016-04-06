# PhpMimeType 
[![Build Status](https://travis-ci.org/dfridrich/PhpMimeType.svg)](https://travis-ci.org/dfridrich/PhpMimeType)
[![Latest Stable Version](https://poser.pugx.org/dfridrich/php-mime-type/v/stable)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![Total Downloads](https://poser.pugx.org/dfridrich/php-mime-type/downloads)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![License](https://poser.pugx.org/dfridrich/php-mime-type/license)](https://packagist.org/packages/dfridrich/php-mime-type)

Simple class for guessing PHP Mime Type based on file extension.

Installation with [Composer](https://getcomposer.org/)
-----------------------------------------------------

``` sh
php composer require dfridrich/php-mime-type:v1.*
```

Usage
-----

``` php
// outputs text/html
echo \Defr\MimeType::get('index.php');
// outputs application/octet-stream
echo \Defr\MimeType::get('Video.avi');
// outputs image/jpeg
echo \Defr\MimeType::get('Image.JPEG');
// outputs application/octet-stream
echo \Defr\MimeType::get('someStrange.extension');
```

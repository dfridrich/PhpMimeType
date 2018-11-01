# PhpMimeType v2

[![Join the chat at https://gitter.im/dfridrich/PhpMimeType](https://badges.gitter.im/dfridrich/PhpMimeType.svg)](https://gitter.im/dfridrich/PhpMimeType?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/dfridrich/PhpMimeType.svg)](https://travis-ci.org/dfridrich/PhpMimeType)
[![Latest Stable Version](https://poser.pugx.org/dfridrich/php-mime-type/v/stable)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![Total Downloads](https://poser.pugx.org/dfridrich/php-mime-type/downloads)](https://packagist.org/packages/dfridrich/php-mime-type)
[![Monthly Downloads](https://poser.pugx.org/dfridrich/php-mime-type/d/monthly)](https://packagist.org/packages/dfridrich/php-mime-type)
[![License](https://poser.pugx.org/dfridrich/php-mime-type/license)](https://packagist.org/packages/dfridrich/php-mime-type)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8c39bad3-cd2f-46d0-9b81-e1d4785429a6/mini.png)](https://insight.sensiolabs.com/projects/8c39bad3-cd2f-46d0-9b81-e1d4785429a6)

![PhpMimeType](phpmimetype.png "PhpMimeType")

Simple PHP class for guessing file mime type based on file extension with ability to use in Symfony project.

## Install

``` sh
composer require dfridrich/php-mime-type
```

## Usage

### Basic usage

```php
<?php

// from string, can be used on non-existing files
echo \Defr\PhpMimeType\MimeType::get('index.php'); // outputs text/html

// from SplFileInfo
echo \Defr\PhpMimeType\MimeType::get(new \SplFileInfo('Video.avi')); // outputs text/html

// from SplFileObject
echo \Defr\PhpMimeType\MimeType::get(new \SplFileObject('Image.JPEG')); // outputs image/jpeg

// from string
echo \Defr\PhpMimeType\MimeType::get('someStrange.extension'); // outputs application/octet-stream

// Multiple files
$files = ['index.php', new \SplFileInfo('Video.avi'), new \SplFileObject('example.php')];
/** @var \Defr\PhpMimeType\MimeTypeInfo[] $mimeTypes */
$mimeTypes = \Defr\PhpMimeType\MimeType::multiple($files);

foreach ($mimeTypes as $mimeType) {
    echo sprintf('File "%s" is mime type "%s"', $mimeType->getFileName(), $mimeType->getMimeType()).'<br>';
}

// Guess FontAwesome icon
echo \Defr\PhpMimeType\MimeType::getFontAwesomeIcon('test.pdf'); // fa fa-file-pdf-o
// ...with fixed width icon
echo \Defr\PhpMimeType\MimeType::getFontAwesomeIcon('test.pdf', true); // fa fa-file-pdf-o fa-fw

```

### Symfony response

If you want to use Symfony response feature, install HTTP Foundation package too.

``` sh
composer require symfony/http-foundation
```

Just pass the file name or SPL object to response method and you will get Symfony\Component\HttpFoundation\Response object.
Disposition is **attachment** by default, you can chage it to **inline** or use Symfony ResponseHeaderBag's
constants DISPOSITION_ATTACHMENT or DISPOSITION_INLINE.

```php
<?php

// Return response to download this file as attachment (default)
$response = \Defr\PhpMimeType\MimeType::response(__FILE__);
$response->send();

// Return response to download this file inline
$response = \Defr\PhpMimeType\MimeType::response(__FILE__, \Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_INLINE);
$response->send();

// You can use FileAsResponse object too (and own file name)
$response = \Defr\PhpMimeType\FileAsResponse::get(__FILE__, null, "my-own-file-name.txt");
$response->send();

// Or directly send it to browser
$response = \Defr\PhpMimeType\FileAsResponse::send(__FILE__);
```

### More examples and documentation

See [more examples](examples/).

API documentation can be found [here](http://dfridrich.github.io/PhpMimeType/).

## Testing

``` bash
composer test
```

## Credits

### Contributors

* [Dennis Fridrich](https://github.com/dfridrich)
* Nick Shek
* [Giso Stallenberg](https://github.com/gisostallenberg)
* [sml-joyo](https://github.com/sml-joyo)

### Thanks to...

* [freepik.com](http://www.freepik.com) - it provided photo in logo
* [svogal](http://php.net/manual/en/function.mime-content-type.php#87856) - this guy inspired me to create this library
* [colemanw](https://gist.github.com/colemanw/9c9a12aae16a4bfe2678de86b661d922) - his gist inspired me to add FontAwesome support

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

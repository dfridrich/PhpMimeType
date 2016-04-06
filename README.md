# PhpMimeType 

[![Join the chat at https://gitter.im/dfridrich/PhpMimeType](https://badges.gitter.im/dfridrich/PhpMimeType.svg)](https://gitter.im/dfridrich/PhpMimeType?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/dfridrich/PhpMimeType.svg)](https://travis-ci.org/dfridrich/PhpMimeType)
[![Latest Stable Version](https://poser.pugx.org/dfridrich/php-mime-type/v/stable)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![Total Downloads](https://poser.pugx.org/dfridrich/php-mime-type/downloads)](https://packagist.org/packages/dfridrich/php-mime-type)
[![Monthly Downloads](https://poser.pugx.org/dfridrich/php-mime-type/d/monthly)](https://packagist.org/packages/dfridrich/php-mime-type)
[![License](https://poser.pugx.org/dfridrich/php-mime-type/license)](https://packagist.org/packages/dfridrich/php-mime-type)

![PhpMimeType](phpmimetype.png "PhpMimeType")

Simple PHP class for guessing file mime type based on file extension with ability to use in Symfony project.

## Install

Via Composer

``` sh
$ composer require dfridrich/php-mime-type
```

## Usage

### Basic usage

``` php
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

```

### Symfony response

If you want to use Symfony response feature, install HTTP Foundation package too.

``` sh
$ composer require symfony/http-foundation
```

Just pass the file name or SPL object to response method and you will get Symfony\Component\HttpFoundation\Response object.
Disposition is **attachment** by default, you can chage it to **inline** or use Symfony ResponseHeaderBag's
constants DISPOSITION_ATTACHMENT or DISPOSITION_INLINE.

``` php
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
$ composer test
```

## Contributing

* Fork the project.
* Make your feature addition or bug fix.
* Add tests for it. This is important so I don't break it in a future version unintentionally.
* Commit just the modifications.
* Ensure your code is nicely formatted in the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
  style and that all tests pass.
* Send the pull request.
* Check that the Travis CI build passed. If not, rinse and repeat.
* For communication with contributors you can use [Gitter](https://gitter.im/dfridrich/PhpMimeType).
* Use [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) like this ``` php-cs-fixer fix . --level=psr2 ```

## Credits

- [Dennis Fridrich](https://github.com/dfridrich)
- Nick Shek
- [Giso Stallenberg](https://github.com/gisostallenberg)

Photo by [freepik.com](http://www.freepik.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

# PhpMimeType 
[![Build Status](https://travis-ci.org/dfridrich/PhpMimeType.svg)](https://travis-ci.org/dfridrich/PhpMimeType)
[![Latest Stable Version](https://poser.pugx.org/dfridrich/php-mime-type/v/stable)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![Total Downloads](https://poser.pugx.org/dfridrich/php-mime-type/downloads)](https://packagist.org/packages/dfridrich/php-mime-type) 
[![License](https://poser.pugx.org/dfridrich/php-mime-type/license)](https://packagist.org/packages/dfridrich/php-mime-type)

![PhpMimeType](phpmimetype.png "PhpMimeType")

Simple PHP class for guessing file mime type based on file extension.

## Install

Via Composer

``` sh
$ composer require dfridrich/php-mime-type
```

## Usage

``` php
// from string, can be used on non-existing files
echo \Defr\MimeType::get('index.php'); // outputs text/html

// from SplFileInfo
echo \Defr\MimeType::get(new \SplFileInfo('Video.avi')); // outputs text/html

// from SplFileObject, outputs image/jpeg
echo \Defr\MimeType::get(new \SplFileObject('Image.JPEG'));

// from string
echo \Defr\MimeType::get('someStrange.extension'); // outputs application/octet-stream

// Multiple files
$files = ['index.php', new \SplFileInfo('Video.avi'), new \SplFileObject('example.php')];
/** @var \Defr\MimeTypeInfo[] $mimeTypes */
$mimeTypes = \Defr\MimeType::multiple($files);

foreach ($mimeTypes as $mimeType) {
    echo sprintf('File "%s" is mime type "%s"', $mimeType->getFileName(), $mimeType->getMimeType()).'<br>';
}

```

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

## Credits

- [Dennis Fridrich](https://github.com/dfridrich)
- Nick Shek

Photo by [freepik.com](http://www.freepik.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
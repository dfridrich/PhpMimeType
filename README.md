# PhpMimeType

Simple class for guessing PHP Mime Type.

Installation via [Composer](https://getcomposer.org/)
-----------------------------------------------------

Add PhpMimeType to your composer.json:

``` sh
{
    "require": {
        "dfridrich/php-mime-type": "dev-master"
    }
}
```

Then run
``` sh
php composer.phar update
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

Don't forget to include PhpMimeType class using require or Composer autoloader!

Donations
---------

Small support is support too, consider
[donation](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HRGMJ877WA3JQ) :-)
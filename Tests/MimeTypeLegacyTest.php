<?php

use Defr\MimeType;

/**
 * Class MimeTypeLegacyTest
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class MimeTypeLegacyTest extends PHPUnit_Framework_TestCase
{
    public function testMimeTypes()
    {
        $this->assertEquals('text/html', MimeType::get('index.html'));
        $this->assertEquals('application/octet-stream', MimeType::get('video.avi'));
        $this->assertEquals('image/jpeg', MimeType::get('picture.jpg'));
        $this->assertEquals('application/octet-stream', MimeType::get('some.strangeExtension'));
    }
}

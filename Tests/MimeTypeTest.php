<?php

/*
 * This file is part of the library "PhpMimeType".
 *
 * (c) Dennis Fridrich <fridrich.dennis@gmail.com>
 *
 * For the full copyright and license information,
 * please view LICENSE.
 */

use Defr\PhpMimeType\MimeType;

class MimeTypeTest extends PHPUnit_Framework_TestCase
{
    public function testMimeTypesFromFileName()
    {
        $this->assertSame('text/html', MimeType::get('index.html'));
        $this->assertSame('application/octet-stream', MimeType::get('video.avi'));
        $this->assertSame('image/jpeg', MimeType::get('picture.jpg'));
        $this->assertSame('application/octet-stream', MimeType::get('some.strangeExtension'));
        $this->assertSame('application/octet-stream', MimeType::get('fileWithoutExtension'));
        // non-existing file
        $this->assertSame('application/octet-stream', MimeType::get('fake-file.omfg'));
    }

    public function testMimeTypesFromSplFileInfo()
    {
        $this->assertSame('text/html', MimeType::get(new \SplFileInfo('index.html')));
        $this->assertSame('application/octet-stream', MimeType::get(new \SplFileInfo('video.avi')));
        $this->assertSame('image/jpeg', MimeType::get(new \SplFileInfo('picture.jpg')));
        $this->assertSame('application/octet-stream', MimeType::get(new \SplFileInfo('some.strangeExtension')));
        $this->assertSame('application/octet-stream', MimeType::get(new \SplFileInfo('fileWithoutExtension')));
    }

    public function testMimeTypesFromSplFileObject()
    {
        $this->assertSame('text/html', MimeType::get(new \SplFileObject(__FILE__)));
    }

    public function testMimeTypeInfo()
    {
        $this->assertInstanceOf('Defr\\PhpMimeType\\MimeTypeInfo', MimeType::info(new \SplFileObject(__FILE__)));
    }

    public function testMimeTypeResponse()
    {
        $this->assertInstanceOf(
            'Symfony\\Component\\HttpFoundation\\Response',
            MimeType::response(new \SplFileObject(__FILE__))
        );
    }

    public function testMimeTypeResponseWithOwnFileName()
    {
        $randomFileName = time().'.txt';
        $this->assertContains(
            $randomFileName,
            (string) MimeType::response(new \SplFileObject(__FILE__), null, "$randomFileName")
        );
    }

    public function testFontAwesome()
    {
        $this->assertSame('fa fa-file-pdf-o', MimeType::getFontAwesomeIcon('test.pdf'));
        $this->assertSame('fa fa-file-pdf-o fa-fw', MimeType::getFontAwesomeIcon('test.pdf', true));
        $this->assertSame('fa fa-file-o', MimeType::getFontAwesomeIcon('test.weirdextension'));
    }
}

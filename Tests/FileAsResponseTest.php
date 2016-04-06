<?php

use Defr\PhpMimeType\FileAsResponse;

/**
 * Class FileAsResponseTest
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class FileAsResponseTest extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $this->assertInstanceOf(
            'Symfony\\Component\\HttpFoundation\\Response',
            FileAsResponse::get(new \SplFileObject(__FILE__))
        );
    }

    public function testSend()
    {
        $this->assertStringStartsWith(
            "HTTP/1.0 200 OK",
            (string)FileAsResponse::send(new \SplFileObject(__FILE__))
        );
    }
}

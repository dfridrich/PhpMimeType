<?php

namespace Defr\PhpMimeType;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Class FileAsResponse
 * @package Defr\PhpMimeType
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class FileAsResponse
{
    /**
     * @param $file
     * @param string $disposition
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws MimeTypeException
     */
    public static function get($file, $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT)
    {
        return MimeType::response($file, $disposition);
    }

    /**
     * @param $file
     * @param string $disposition
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws MimeTypeException
     */
    public static function send($file, $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT)
    {
        return MimeType::response($file, $disposition)->send();
    }

}

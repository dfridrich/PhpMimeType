<?php

/*
 * This file is part of the library "PhpMimeType".
 *
 * (c) Dennis Fridrich <fridrich.dennis@gmail.com>
 *
 * For the full copyright and license information,
 * please view LICENSE.
 */

namespace Defr\PhpMimeType;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Class FileAsResponse.
 *
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class FileAsResponse
{
    /**
     * @param $file
     * @param string $disposition
     * @param null   $fileName
     *
     * @throws MimeTypeException
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public static function get($file, $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT, $fileName = null)
    {
        return MimeType::response($file, $disposition, $fileName);
    }

    /**
     * @param $file
     * @param string $disposition
     * @param null   $fileName
     *
     * @throws MimeTypeException
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public static function send($file, $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT, $fileName = null)
    {
        return MimeType::response($file, $disposition, $fileName)->send();
    }
}

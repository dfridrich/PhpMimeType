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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * @see http://php.net/manual/en/function.mime-content-type.php#87856
 */
class MimeType
{
    /**
     * @var array
     */
    public static $mimeTypes = [
        'txt'  => 'text/plain',
        'csv'  => 'text/csv',
        'htm'  => 'text/html',
        'html' => 'text/html',
        'php'  => 'text/html',
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'json' => 'application/json',
        'xml'  => 'application/xml',
        'swf'  => 'application/x-shockwave-flash',
        'flv'  => 'video/x-flv',
        // Images
        'png'  => 'image/png',
        'jpe'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg'  => 'image/jpeg',
        'gif'  => 'image/gif',
        'bmp'  => 'image/bmp',
        'ico'  => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif'  => 'image/tiff',
        'svg'  => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        // Archives
        'zip'  => 'application/zip',
        'rar'  => 'application/x-rar-compressed',
        'exe'  => 'application/x-msdownload',
        'msi'  => 'application/x-msdownload',
        'cab'  => 'application/vnd.ms-cab-compressed',
        // Audio/video
        'mpg'  => 'audio/mpeg',
        'mp2'  => 'audio/mpeg',
        'mp3'  => 'audio/mpeg',
        'mp4'  => 'audio/mp4',
        'qt'   => 'video/quicktime',
        'mov'  => 'video/quicktime',
        'ogg'  => 'audio/ogg',
        'oga'  => 'audio/ogg',
        'wav'  => 'audio/wav',
        'webm' => 'audio/webm',
        'aac'  => 'audio/aac',
        // Adobe
        'pdf'  => 'application/pdf',
        'psd'  => 'image/vnd.adobe.photoshop',
        'ai'   => 'application/postscript',
        'eps'  => 'application/postscript',
        'ps'   => 'application/postscript',
        // MS Office
        'doc'  => 'application/msword',
        'dot'  => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
        'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
        'odt'  => 'application/vnd.oasis.opendocument.text',
        'rtf'  => 'application/rtf',
        'xls'  => 'application/vnd.ms-excel',
        'xlt'  => 'application/vnd.ms-excel',
        'xla'  => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
        'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
        'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
        'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
        'ppt'  => 'application/vnd.ms-powerpoint',
        'pot'  => 'application/vnd.ms-powerpoint',
        'pps'  => 'application/vnd.ms-powerpoint',
        'ppa'  => 'application/vnd.ms-powerpoint',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
        'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
        'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
        'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
        'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
        'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
        'mdb'  => 'application/vnd.ms-access',
        'ods'  => 'application/vnd.oasis.opendocument.spreadsheet',
    ];

    /**
     * @var array
     */
    public static $fa = [
        // Media
        'image'                                                          => 'fa-file-image-o',
        'audio'                                                          => 'fa-file-audio-o',
        'video'                                                          => 'fa-file-video-o',
        // Documents
        'application/pdf'                                                => 'fa-file-pdf-o',
        'pdf'                                                            => 'fa-file-pdf-o',
        'application/msword'                                             => 'fa-file-word-o',
        'application/vnd.ms-word'                                        => 'fa-file-word-o',
        'application/vnd.oasis.opendocument.text'                        => 'fa-file-word-o',
        'application/vnd.openxmlformats-officedocument.wordprocessingml' => 'fa-file-word-o',
        'application/vnd.ms-excel'                                       => 'fa-file-excel-o',
        'application/vnd.openxmlformats-officedocument.spreadsheetml'    => 'fa-file-excel-o',
        'application/application/vnd.oasis.opendocument.spreadsheet'     => 'fa-file-excel-o',
        'application/vnd.oasis.opendocument.spreadsheet'                 => 'fa-file-excel-o',
        'csv'                                                            => 'fa-file-excel-o',
        'application/vnd.ms-powerpoint'                                  => 'fa-file-powerpoint-o',
        'application/vnd.openxmlformats-officedocument.presentationml'   => 'fa-file-powerpoint-o',
        'application/vnd.oasis.opendocument.presentation'                => 'fa-file-powerpoint-o',
        // Other
        'text/plain'                                                     => 'fa-file-text-o',
        'text/html'                                                      => 'fa-file-code-o',
        'application/json'                                               => 'fa-file-code-o',
        // Archives
        'application/gzip'                                               => 'fa-file-archive-o',
        'application/zip'                                                => 'fa-file-archive-o',
    ];

    const MIME_TYPE_IF_UNKNOWN = 'application/octet-stream';

    /**
     * @param string|\SplFileInfo|\SplFileObject $file
     *
     * @return mixed|string
     */
    public static function get(
        $file
    ) {
        if (is_string($file)) {
            $file = new \SplFileInfo($file);
        }

        $extension = mb_strtolower($file->getExtension());
        if ('' === $extension) {
            return static::MIME_TYPE_IF_UNKNOWN;
        }

        if (array_key_exists($extension, static::$mimeTypes)) {
            return static::$mimeTypes[$extension];
        }

        if (function_exists('finfo_open') && $file->isFile()) {
            $path = $file->getPath();

            $fileInfo = finfo_open(FILEINFO_MIME);
            $mimeType = finfo_file($fileInfo, $path);
            finfo_close($fileInfo);

            return $mimeType;
        }

        return static::MIME_TYPE_IF_UNKNOWN;
    }

    /**
     * @param array $files
     *
     * @throws MimeTypeException
     *
     * @return array|MimeTypeInfo[]
     */
    public static function multiple(
        array $files
    ) {
        $out = [];
        foreach ($files as $file) {
            $out[] = static::info($file);
        }

        return $out;
    }

    /**
     * @param $file
     *
     * @throws MimeTypeException
     *
     * @return MimeTypeInfo
     */
    public static function info(
        $file
    ) {
        return new MimeTypeInfo($file, static::get($file));
    }

    /**
     * @param $file
     * @param string $disposition
     * @param null   $fileName
     *
     * @throws MimeTypeException
     *
     * @return Response
     */
    public static function response(
        $file,
        $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT,
        $fileName = null
    ) {
        if (!class_exists('Symfony\\Component\\HttpFoundation\\Response')) {
            throw new MimeTypeException('HttpFoundation component not found, install it.');
        }

        if (
        !in_array(
            $disposition,
            [ResponseHeaderBag::DISPOSITION_INLINE, ResponseHeaderBag::DISPOSITION_ATTACHMENT],
            true
        )
        ) {
            $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT;
        }

        $info = static::info($file);
        $spl = $info->getSplFileObject();

        $response = new Response($spl->fread($spl->getSize()));

        $response->headers->set('Content-Type', $info->getMimeType());
        $disposition = $response->headers->makeDisposition(
            $disposition,
            null === $fileName ? $spl->getFileName() : $fileName
        );
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }

    public static function getFontAwesomeIcon($file, $fixedWidth = false)
    {
        $fileMimeType = self::get($file);

        $foundIcon = 'fa-file-o';
        foreach (self::$fa as $mimeType => $icon) {
            if (false !== mb_strpos($fileMimeType, $mimeType)) {
                $foundIcon = $icon;
            }
        }

        return 'fa '.$foundIcon.($fixedWidth ? ' fa-fw' : null);
    }
}

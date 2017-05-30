<?php

namespace Defr\PhpMimeType;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Class MimeType
 * @package Defr\PhpMimeType
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 * @see http://php.net/manual/en/function.mime-content-type.php#87856
 */
class MimeType
{

    /**
     * @var array
     */
    public static $mimeTypes = [
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',
        // Images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        // Archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',
        // Audio/video
        'mpg' => 'audio/mpeg',
        'mp2' => 'audio/mpeg',
        'mp3' => 'audio/mpeg',
        'mp4' => 'audio/mp4',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'ogg' => 'audio/ogg',
        'oga' => 'audio/ogg',
        'wav' => 'audio/wav',
        'webm' => 'audio/webm',
        'aac' => 'audio/aac',
        // Adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',
        // MS Office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        // Open Office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    ];

    const MIME_TYPE_IF_UNKNOWN = 'application/octet-stream';

    /**
     * @param string|\SplFileInfo|\SplFileObject $file
     * @return mixed|string
     * @throws MimeTypeException
     */
    public static function get($file)
    {
        if (is_string($file)) {
            $file = new \SplFileInfo($file);
        }

        $extension = strtolower($file->getExtension());
        if ($extension === '') {
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
     * @return array|MimeTypeInfo[]
     */
    public static function multiple(array $files)
    {
        $out = [];
        foreach ($files as $file) {
            $out[] = static::info($file);
        }

        return $out;
    }

    /**
     * @param $file
     * @return MimeTypeInfo
     */
    public static function info($file)
    {
        return new MimeTypeInfo($file, static::get($file));
    }

    /**
     * @param $file
     * @param string $disposition
     * @param null $fileName
     * @return Response
     * @throws MimeTypeException
     */
    public static function response($file, $disposition = ResponseHeaderBag::DISPOSITION_ATTACHMENT, $fileName = null)
    {
        if (!class_exists('Symfony\\Component\\HttpFoundation\\Response')) {
            throw new MimeTypeException('HttpFoundation component not found, install it.');
        }

        if (!in_array(
            $disposition,
            [ResponseHeaderBag::DISPOSITION_INLINE, ResponseHeaderBag::DISPOSITION_ATTACHMENT]
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
            $fileName === null ? $spl->getFileName() : $fileName
        );
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }
}

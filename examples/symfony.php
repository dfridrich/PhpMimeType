<?php

/*
 * This file is part of the library "PhpMimeType".
 *
 * (c) Dennis Fridrich <fridrich.dennis@gmail.com>
 *
 * For the full copyright and license information,
 * please view LICENSE.
 */

require '../vendor/autoload.php';

// Return response to download this file as attachment
$response = \Defr\PhpMimeType\MimeType::response(__FILE__);
$response->send();

// With own file name
$response = \Defr\PhpMimeType\FileAsResponse::get(__FILE__, 'inline', 'my-own-filename.txt');
$response->send();

// Directly send response to browser
$response = \Defr\PhpMimeType\FileAsResponse::send(__FILE__);

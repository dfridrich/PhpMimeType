<?php

require "../vendor/autoload.php";

// Return response to download this file as attachment
$response = \Defr\PhpMimeType\MimeType::response(__FILE__);
$response->send();

// or...
$response = \Defr\PhpMimeType\FileAsResponse::get(__FILE__);
$response->send();

// or...
$response = \Defr\PhpMimeType\FileAsResponse::send(__FILE__);

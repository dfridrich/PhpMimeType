<?php

require "../vendor/autoload.php";

// Return response to download this file as attachment
$response = \Defr\MimeType::response(__FILE__);
$response->send();
<?php

require "../vendor/autoload.php";
//require 'lib/MimeType.php';

echo \Defr\MimeType::get('index.php') . "<br>";
echo \Defr\MimeType::get('Video.avi') . "<br>";
echo \Defr\MimeType::get('Image.JPEG') . "<br>";
echo \Defr\MimeType::get('someStrange.extension') . "<br>";

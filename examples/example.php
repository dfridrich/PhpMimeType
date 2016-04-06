<?php

require "../vendor/autoload.php";
//require 'lib/MimeType.php';

// From file name, can be used on non-existing files
echo \Defr\MimeType::get('index.php')."<br>";
echo \Defr\MimeType::get('Video.avi')."<br>";
echo \Defr\MimeType::get('Image.JPEG')."<br>";
echo \Defr\MimeType::get('someStrange.extension')."<br>";

// From SplFileInfo
echo \Defr\MimeType::get(new \SplFileInfo('index.php'))."<br>";
echo \Defr\MimeType::get(new \SplFileInfo('Video.avi'))."<br>";
echo \Defr\MimeType::get(new \SplFileInfo('Image.JPEG'))."<br>";
echo \Defr\MimeType::get(new \SplFileInfo('someStrange.extension'))."<br>";

// From SplFileObject
echo \Defr\MimeType::get(new \SplFileObject('example.php'))."<br>";
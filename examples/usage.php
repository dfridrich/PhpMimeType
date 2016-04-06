<?php

require "../vendor/autoload.php";
//require 'lib/MimeType.php';

echo "<h1>PhpMimeType</h1>";

echo "<h2>From file name</h2>";

// From file name, can be used on non-existing files
echo \Defr\MimeType::get('index.php').'<br>';
echo \Defr\MimeType::get('Video.avi').'<br>';
echo \Defr\MimeType::get('Image.JPEG').'<br>';
echo \Defr\MimeType::get('someStrange.extension').'<br>';

echo "<h2>From SplFileInfo</h2>";

// From SplFileInfo
echo \Defr\MimeType::get(new \SplFileInfo('index.php')).'<br>';
echo \Defr\MimeType::get(new \SplFileInfo('Video.avi')).'<br>';
echo \Defr\MimeType::get(new \SplFileInfo('Image.JPEG')).'<br>';
echo \Defr\MimeType::get(new \SplFileInfo('someStrange.extension')).'<br>';

echo "<h2>From SplFileObject</h2>";

// From SplFileObject
echo \Defr\MimeType::get(new \SplFileObject('example.php')).'<br>';

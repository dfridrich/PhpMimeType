<?php

require "../vendor/autoload.php";

echo "<h1>PhpMimeType</h1>";

echo "<h2>From file name</h2>";

// From file name, can be used on non-existing files
echo \Defr\PhpMimeType\MimeType::get('index.php').'<br>';
echo \Defr\PhpMimeType\MimeType::get('Video.avi').'<br>';
echo \Defr\PhpMimeType\MimeType::get('Image.JPEG').'<br>';
echo \Defr\PhpMimeType\MimeType::get('someStrange.extension').'<br>';

echo "<h2>From SplFileInfo</h2>";

// From SplFileInfo
echo \Defr\PhpMimeType\MimeType::get(new \SplFileInfo('index.php')).'<br>';
echo \Defr\PhpMimeType\MimeType::get(new \SplFileInfo('Video.avi')).'<br>';
echo \Defr\PhpMimeType\MimeType::get(new \SplFileInfo('Image.JPEG')).'<br>';
echo \Defr\PhpMimeType\MimeType::get(new \SplFileInfo('someStrange.extension')).'<br>';

echo "<h2>From SplFileObject</h2>";

// From SplFileObject
echo \Defr\PhpMimeType\MimeType::get(new \SplFileObject('example.php')).'<br>';

<?php

require "../vendor/autoload.php";

echo "<h1>PhpMimeType</h1>";

echo "<h2>Multiple files</h2>";

// Multiple files
$files = ['index.php', new \SplFileInfo('Video.avi'), new \SplFileObject('example.php')];
/** @var \Defr\PhpMimeType\MimeTypeInfo[] $mimeTypes */
$mimeTypes = \Defr\PhpMimeType\MimeType::multiple($files);

foreach ($mimeTypes as $mimeType) {
    echo sprintf('File "%s" is mime type "%s"', $mimeType->getFileName(), $mimeType->getMimeType()).'<br>';
}

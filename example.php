<?php

require 'lib/MimeType.php';

echo \Defr\MimeType::get('index.php') . "\n";
echo \Defr\MimeType::get('Video.avi') . "\n";
echo \Defr\MimeType::get('Image.JPEG') . "\n";
echo \Defr\MimeType::get('someStrange.extension') . "\n";
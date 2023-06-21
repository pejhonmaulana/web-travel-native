<?php

$uploads    = '../site/aksi/data-berkas/';
$filename   = @$_GET['file'];
$attachment = $uploads . $filename;

if (file_exists($attachment) && $filename) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($attachment));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: private');
    header('Pragma: private');
    header('Content-Length: ' . filesize($attachment));

    ob_clean();
    flush();
    readfile($attachment);
    
    exit;
} else {
    echo 'File Not Found!';
}
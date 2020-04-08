<?php
session_start();
include __DIR__ . '/lib.php';

ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors',1);

$html = file_get_contents(__DIR__ . '/main.html');
echo str_replace('{{CONTENT}}', getContent(), $html);

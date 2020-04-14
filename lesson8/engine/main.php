<?php
session_start();

const GOODS = 'goods';
const MSG = 'msg';
const AUTH = 'auth';

include __DIR__ . '/lib.php';

$content = getContent();

if (!empty($content)) {
    echo str_replace(
        ['{{CONTENT}}', '{{MSG}}', '{{COUNT}}'],
        [$content, getMsg(), countBasket()],
        file_get_contents(__DIR__ . '/main.html'));
}

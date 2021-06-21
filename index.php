<?php
require_once __DIR__ . '/config/autoload.php';

$operation = new Operation(__DIR__ .'/operations');
$operation->readFile();

echo json_encode(Database::$data, JSON_PRETTY_PRINT);

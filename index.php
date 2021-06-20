<?php
require "config/autoload.php";
$file = new SplFileObject("config/operations");

while (!$file->eof()) {
    $operation = new Operation($file->fgets());
    $operation->create();
}
echo '<pre>';
echo(json_encode(Database::$data, JSON_PRETTY_PRINT));
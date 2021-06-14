<?php

require "config/autoload.php";

$operations = new SplFileObject("config/operations");
$output = array();

while (!$operations->eof()) {
    $operation = json_decode($operations->fgets());

    if ($operation) {
        if (property_exists($operation, 'account')) {
            $account = new Account($operation, $output);
            array_push($output, $account->create());
        } elseif (property_exists($operation, 'transaction')) {
           /*  $transaction = new Transaction($operation); */
        } else {
            array_push($output, 'operation-not-defined');
        }
    }
}
echo '<pre>';
var_dump(json_encode($output)); 
die();
$operations = null;

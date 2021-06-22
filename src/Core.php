<?php

class Core
{
    public static function run($operation, $print = false)
    {
        $operation = new Operation($operation);
        $operation->readFile();
        if ($print) {
            echo json_encode(Database::$data, JSON_PRETTY_PRINT);
        }
        return;
    }

    public static function tests()
    {
        echo 'START TEST EXECUTION CASES [OK]', PHP_EOL;
        $testCase = new TestCase();
        $testCase->Account();
        $testCase->Transaction();
        echo 'END TEST EXECUTION CASES [OK]', PHP_EOL;
        return;
    }
}

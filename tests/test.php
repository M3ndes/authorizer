<?php
require_once __DIR__ . '/../config/autoload.php';

echo 'START TEST EXECUTION CASES [OK]', PHP_EOL;
$testCase = new TestCase();
$testCase->Account();
$testCase->Transaction();
echo 'END TEST EXECUTION CASES [OK]', PHP_EOL;

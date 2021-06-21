<?php

class AccountTest extends TestCase
{
    private $output;

    public function __construct()
    {
        $this->output = json_encode(Database::$data);
    }

    public function create()
    {
        $expectedOutput = '[{"account":{"active-card":true,"available-limit":1000,"violations":[]}}]';
        $expectedOutput == $this->output ? $return = "CREATE ACCOUNT TEST [OK]" : $return = "CREATE ACCOUNT TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    public function notInitialized()
    {
        $expectedOutput = '[{"account":{},"violations":["account-not-initialized"]}]';
        $expectedOutput == $this->output ? $return = "ACCOUNT NOT INITIALIZED TEST [OK]" : $return = "ACCOUNT NOT INITIALIZED TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    public function cardNotActive()
    {
        $expectedOutput = '[{"account":{"active-card":false,"available-limit":1251,"violations":[]}},{"account":{"active-card":false,"available-limit":1251,"violations":["card-not-active"]}}]';
        $expectedOutput == $this->output ? $return = "CARD NOT ACTIVE TEST [OK]" : $return = "CARD NOT ACTIVE TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    public function insufficientLimit()
    {
        $expectedOutput = '[{"account":{"active-card":true,"available-limit":1249,"violations":[]}},{"account":{"active-card":true,"available-limit":1249,"violations":["insufficient-limit"]}}]';
        $expectedOutput == $this->output ? $return = "INSUFFICIENT LIMIT TEST [OK]" : $return = "INSUFFICIENT LIMIT TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }
}

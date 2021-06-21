<?php

class TransactionTest extends TestCase
{
    private $output;

    public function __construct()
    {
        $this->output = json_encode(Database::$data);
    }

    function create()
    {
        $expectedOutput = '[{"account":{"active-card":true,"available-limit":1251,"violations":[]}},{"account":{"active-card":true,"available-limit":1,"violations":[]}}]';
        $expectedOutput == $this->output ? $return = "CREATE TRANSACTION TEST [OK]" : $return = "CREATE ACCOUNT TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    function highFrequencySmallInterval()
    {
        $expectedOutput = '[{"account":{"active-card":true,"available-limit":100,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":[]}},{"account":{"active-card":true,"available-limit":60,"violations":[]}},{"account":{"active-card":true,"available-limit":40,"violations":[]}},{"account":{"active-card":true,"available-limit":40,"violations":["high-frequency-small-interval"]}}]';
        $expectedOutput == $this->output ? $return = "HIGH FREQUENCY SMALL INTERVAL TEST [OK]" : $return = "HIGH FREQUENCY SMALL INTERVAL TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    function doubleTransaction()
    {
        $expectedOutput = '[{"account":{"active-card":true,"available-limit":100,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":["double-transaction"]}}]';
        $expectedOutput == $this->output ? $return = "DOUBLE TRANSACTION TEST [OK]" : $return = "DOUBLE TRANSACTION TEST [FAILED]";
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }
}

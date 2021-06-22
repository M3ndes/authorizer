<?php

class TestCase
{
    private $output;

    public function __construct()
    {
        $this->output = json_encode(Database::$data);
    }

    public function clear()
    {
        Database::$data = [];
        Database::$transactions = [];
        return;
    }

    protected function recieveArray($array)
    {
        $this->endTest($array['expectedOutput'] == $this->output ? $array['message'] . ' [OK]' : $array['message'] . ' [FAILED]');
        return;
    }

    public function runTests(InterfaceTest $class)
    {
        foreach ($class::tests() as $test) {
            Core::run($test['file']);
            $this->output = json_encode(Database::$data);
            $this->recieveArray($test);
        }
        return;
    }
    protected function endTest($return)
    {
        echo $return, PHP_EOL;
        $this->clear();
        return;
    }

    public function Account()
    {
        $this->runTests(new AccountTest());
        return;
    }

    public function Transaction()
    {
        $this->runTests(new TransactionTest());
    }
}

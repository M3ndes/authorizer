<?php

class Operation
{
    private $operation;

    public function __construct(string $operation)
    {
        $this->operation = json_decode($operation);
    }

    public function create()
    {
        if ($this->isMethod('account')) {
            $account = new Account($this->operation);
            Database::create($account->create(), 'data');
        } elseif ($this->isMethod('transaction')) {
            $transaction = new Transaction($this->operation);
            Database::create($transaction->create(), 'data');
        } else {
            Database::create('operation-not-defined', 'data');
        }
        return;
    }

    private function isMethod($string)
    {
        return property_exists($this->operation, $string);
    }
}
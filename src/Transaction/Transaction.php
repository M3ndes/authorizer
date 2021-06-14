<?php

class Transaction
{
    private $transaction;
    private $output;

    public function __construct(string $transaction, array $output)
    {
        $this->transaction = $transaction;
        $this->output = $output;
    }

    public function create()
    {
        return $this->account;
    }
}

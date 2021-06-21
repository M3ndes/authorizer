<?php

class Operation
{
    private $file;

    public function __construct(string $file)
    {
        $this->file = new SplFileObject($file);
    }

    public function readFile()
    {
        while (!$this->file->eof()) {
            $this->create(json_decode($this->file->fgets()));
        }
        return;
    }

    public function create($operation)
    {
        if (property_exists($operation, 'account')) {
            $account = new Account($operation);
            Database::create($account->create(), 'data');
        } elseif (property_exists($operation, 'transaction')) {
            $transaction = new Transaction($operation);
            Database::create($transaction->create(), 'data');
        } else {
            Database::create('operation-not-defined', 'data');
        }
        return;
    }
}

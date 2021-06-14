<?php

class Account
{
    private $account;
    private $output;

    public function __construct(stdClass $account, array $output)
    {
        $this->account = $account;
        $this->output = $output;
    }

    public function create()
    {
        $this->wasCreated();
        return $this->account;
    }

    private function wasCreated()
    {
        array_column($this->output, 'account') != null ?
            $this->account->violations = ['account-already-initialized'] :
            $this->account->violations = [];
        return;
    }
}

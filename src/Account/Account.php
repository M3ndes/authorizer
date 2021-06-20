<?php

class Account
{
    private $account;

    public function __construct(stdClass $account)
    {
        $this->account = $account;
    }

    public function create()
    {
        if (!$this->wasCreated()) {
            $this->account->account->violations = [];
            return $this->account;
        } else {
            return $this->alreadyinitialized();
        }
    }

    private function wasCreated()
    {
        return Database::fisrt('account') != null ? true : false;
    }

    private function alreadyinitialized()
    {
        $instance = unserialize(serialize(Database::fisrt('account')));
        $instance->account->violations = ['account-already-initialized'];
        return $instance;
    }

}

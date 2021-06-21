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
        if (!$this->wasInitialized()) {
            $this->account->account->violations = [];
            return $this->account;
        } else {
            return $this->alreadyinitialized();
        }
    }

    public function wasInitialized()
    {
        return Database::fisrt('account') != null ? true : false;
    }

    public function alreadyinitialized()
    {
        $instance = unserialize(serialize(Database::fisrt('account')));
        $instance->account->violations = ['account-already-initialized'];
        return $instance;
    }

    public function notInitialized()
    {
        $object = new stdClass();
        $object->account = (object)[];
        $object->violations = ['account-not-initialized'];
        return $object;
    }

    public function isCardActive()
    {
        return Database::last('account')->account->{'active-card'} == true ? true : false;
    }

    public function cardNotActive()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['card-not-active'];
        return $instance;
    }

    public function haveLimit($transactionAmount)
    {
        return Database::last('account')->account->{'available-limit'} >= $transactionAmount ? true : false;
    }

    public function insufficientLimit()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['insufficient-limit'];
        return $instance;
    }
}

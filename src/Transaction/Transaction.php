<?php

class Transaction
{
    private $transaction;

    public function __construct(stdClass $transaction)
    {
        $this->transaction = $transaction;
    }

    public function create()
    {
        if (!$this->wasInitialized()) {
            return $this->notInitialized();
        }

        if (!$this->isCardActive()) {
            return $this->cardNotActive();
        }

        if (!$this->haveLimit()) {
            return $this->insufficientLimit();
        }

        if ($this->verifySmallInterval()) {
            return $this->highFrequencySmallInterval();
        }

        if ($this->verifyDoubleTransactions()) {
            return $this->doubleTransactions();
        }

        Database::create($this->transaction, 'transactions');
        return $this->decreaseLimit();
    }

    private function wasInitialized()
    {
        return Database::fisrt('account') != null ? true : false;
    }

    private function notInitialized()
    {
        $object = new stdClass();
        $object->account = (object)[];
        $object->violations = ['account-not-initialized'];
        return $object;
    }

    private function isCardActive()
    {
        return Database::last('account')->account->{'active-card'} == true ? true : false;
    }

    private function cardNotActive()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['card-not-active'];
        return $instance;
    }

    private function haveLimit()
    {
        return Database::last('account')->account->{'available-limit'} >= $this->transaction->transaction->amount ? true : false;
    }

    private function insufficientLimit()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['insufficient-limit'];
        return $instance;
    }

    private function verifySmallInterval()
    {
        return Database::verifySmallInterval($this->transaction) == true ? true : false;
    }

    private function highFrequencySmallInterval()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['high-frequency-small-interval'];
        return $instance;
    }

    private function verifyDoubleTransactions()
    {
        return Database::verifyDoubleTransactions($this->transaction) == true ? true : false;
    }

    private function doubleTransactions()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->violations = ['double-transaction'];
        return $instance;
    }

    private function decreaseLimit()
    {
        $instance = unserialize(serialize(Database::last('account')));
        $instance->account->{'available-limit'} = $instance->account->{'available-limit'} - $this->transaction->transaction->amount;
        return $instance;
    }
}
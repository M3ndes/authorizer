<?php

class Transaction
{
    private $transaction;

    public function __construct(stdClass $transaction)
    {
        $this->transaction = $transaction;
        $this->account     = new Account(Database::last('account'));
    }

    public function create()
    {
        if (!$this->account->wasInitialized()) {
            return $this->account->notInitialized();
        }

        if (!$this->account->isCardActive()) {
            return $this->account->cardNotActive();
        }

        if (!$this->account->haveLimit($this->transaction->transaction->amount)) {
            return $this->account->insufficientLimit();
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

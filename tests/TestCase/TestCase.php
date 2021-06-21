<?php

class TestCase
{
    public function callOperation($operation)
    {
        $operation = new Operation(__DIR__ . "$operation");
        $operation->readFile();
        return;
    }

    public function clear()
    {
        Database::$data = [];
        Database::$transactions = [];
        return;
    }

    public function Account()
    {
        $this->callOperation('/../operationsTest/createAccountTest');
        $accountTest = new AccountTest();
        $accountTest->create();

        $this->callOperation('/../operationsTest/accountNotInitializedTest');
        $accountTest = new AccountTest();
        $accountTest->notInitialized();

        $this->callOperation('/../operationsTest/cardNotActiveTest');
        $accountTest = new AccountTest();
        $accountTest->cardNotActive();

        $this->callOperation('/../operationsTest/insufficientLimitTest');
        $accountTest = new AccountTest();
        $accountTest->insufficientLimit();
        return;
    }

    public function Transaction()
    {
        $this->callOperation('/../operationsTest/createTransactionTest');
        $transactionTest = new TransactionTest();
        $transactionTest->create();

        $this->callOperation('/../operationsTest/highFrequencySmallIntervalTest');
        $transactionTest = new TransactionTest();
        $transactionTest->highFrequencySmallInterval();

        $this->callOperation('/../operationsTest/doubleTransactionTest');
        $transactionTest = new TransactionTest();
        $transactionTest->doubleTransaction();
        return;
    }
}

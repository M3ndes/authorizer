<?php

class Database
{
    static $data = [];
    static $transactions = [];

    public static function create($data, $source)
    {
        $source == 'data' ? array_push(Database::$data, $data) : array_push(Database::$transactions, $data);
    }

    public static function fisrt($type)
    {
        foreach (Database::$data as $operation) {
            if (!(isset($operation->$type))) {
                continue;
            }
            if (!isset($operation->$type->violations)) {
                continue;
            }
            if ($operation->$type->violations == []) {
                return $operation;
            }
        }
        return null;
    }

    public static function last($type)
    {
        $operations = [];
        foreach (Database::$data as $operation) {
            if (!(isset($operation->$type))) {
                continue;
            }
            if (!isset($operation->$type->violations)) {
                continue;
            }
            if ($operation->$type->violations == []) {
                array_push($operations, $operation);
            }
            continue;
        }
        return (array_pop($operations)) ?? (object)[];
    }

    public static function verifySmallInterval($currentTransaction)
    {
        $transactionsArray = [];
        foreach (Database::$transactions as $transaction) {
            if (Date::getMinutesDifference($transaction->transaction->time, $currentTransaction->transaction->time) <= 2) {
                array_push($transactionsArray, $transaction);
            }
        }
        return sizeof($transactionsArray) >= 3 ? true : false;
    }

    public static function verifyDoubleTransactions($currentTransaction)
    {
        $transactionsArray = [];
        foreach (Database::$transactions as $transaction) {
            if ($transaction->transaction->merchant != $currentTransaction->transaction->merchant) {
                continue;
            }
            if ($transaction->transaction->amount != $currentTransaction->transaction->amount) {
                continue;
            }
            if (Date::getMinutesDifference($transaction->transaction->time, $currentTransaction->transaction->time) <= 2) {
                array_push($transactionsArray, $transaction);
            }
        }
        return sizeof($transactionsArray) >= 1 ? true : false;
    }
}

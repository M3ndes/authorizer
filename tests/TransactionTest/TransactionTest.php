<?php

class TransactionTest implements InterfaceTest
{
    public static function tests()
    {
        return [
            [
                'expectedOutput' => '[{"account":{"active-card":true,"available-limit":1251,"violations":[]}},{"account":{"active-card":true,"available-limit":1,"violations":[]}}]',
                'message' => 'CREATE TRANSACTION TEST',
                'file' => __DIR__ . '/../operationsTest/createTransactionTest'
            ],
            [
                'expectedOutput' => '[{"account":{"active-card":true,"available-limit":100,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":[]}},{"account":{"active-card":true,"available-limit":60,"violations":[]}},{"account":{"active-card":true,"available-limit":40,"violations":[]}},{"account":{"active-card":true,"available-limit":40,"violations":["high-frequency-small-interval"]}}]',
                'message' => 'HIGH FREQUENCY SMALL INTERVAL TEST',
                'file' => __DIR__ . '/../operationsTest/highFrequencySmallIntervalTest'
            ],
            [
                'expectedOutput' => '[{"account":{"active-card":true,"available-limit":100,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":[]}},{"account":{"active-card":true,"available-limit":80,"violations":["double-transaction"]}}]',
                'message' => 'DOUBLE TRANSACTION TEST',
                'file' => __DIR__ . '/../operationsTest/doubleTransactionTest'
            ]
        ];
    }
}

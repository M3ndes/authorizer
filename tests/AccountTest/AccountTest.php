<?php

class AccountTest implements InterfaceTest
{
    public static function tests()
    {
        return [
            [
                'expectedOutput' => '[{"account":{"active-card":true,"available-limit":1000,"violations":[]}}]',
                'message' => 'CREATE ACCOUNT TEST',
                'file' => __DIR__ . '/../operationsTest/createAccountTest'
            ],
            [
                'expectedOutput' => '[{"account":{},"violations":["account-not-initialized"]}]',
                'message' => 'ACCOUNT NOT INITIALIZED TEST',
                'file' => __DIR__ . '/../operationsTest/accountNotInitializedTest'
            ],
            [
                'expectedOutput' => '[{"account":{"active-card":false,"available-limit":1251,"violations":[]}},{"account":{"active-card":false,"available-limit":1251,"violations":["card-not-active"]}}]',
                'message' => 'CARD NOT ACTIVE TEST',
                'file' => __DIR__ . '/../operationsTest/cardNotActiveTest'
            ],
            [
                'expectedOutput' => '[{"account":{"active-card":true,"available-limit":1249,"violations":[]}},{"account":{"active-card":true,"available-limit":1249,"violations":["insufficient-limit"]}}]',
                'message' => 'INSUFFICIENT LIMIT TEST',
                'file' => __DIR__ . '/../operationsTest/insufficientLimitTest'
            ]
        ];
    }
}

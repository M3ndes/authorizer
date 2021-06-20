<?php

class Date
{
    static function getMinutesDifference($fisrtDate, $secondDate)
    {
        return abs(date_create($fisrtDate)->getTimestamp() - date_create($secondDate)->getTimestamp()) / 60;
    }
}

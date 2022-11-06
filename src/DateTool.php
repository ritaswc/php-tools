<?php

namespace Ritaswc\Tools;

class DateTool
{
    /**
     * is Date format string like '2022-01-01'
     * @param $date
     * @return bool
     */
    public static function isDate($date)
    {
        $date = (string)$date;
        if (10 != strlen($date)) {
            return false;
        }
        return date('Y-m-d', strtotime($date)) === $date;
    }

    /**
     * is DateTime format string like '2022-01-01 00:01:02'
     * @param $dateTime
     * @return bool
     */
    public static function isDateTime($dateTime)
    {
        $dateTime = (string)$dateTime;
        if (19 != strlen($dateTime)) {
            return false;
        }
        return date('Y-m-d H:i:s', strtotime($dateTime)) === $dateTime;
    }

    /**
     * weekOfDay transfer into cnWeekOfDay like 0 => 周日 3 => 周三
     * @param $weekOfDay
     * @return string
     */
    public static function cnWeekOfDay($weekOfDay)
    {
        $weekOfDay = (int)$weekOfDay;
        $week      = ['周日', '周一', '周二', '周三', '周四', '周五', '周六'];
        return $week[$weekOfDay % 7];
    }

    /**
     * 00:00 转成秒数
     * @param string $clock
     * @return float|int
     */
    public static function clockToSecond($clock)
    {
        $clock = (string)$clock;
        $arr   = explode(':', $clock);
        return 3600 * $arr[0] + 60 * (isset($arr[1]) ? $arr[1] : 0);
    }

    public static function prefix()
    {
        return '[' . date('Y-m-d H:i:s') . ']';
    }

    /**
     * get Real Date in Date column of Excel File
     * @param $date
     * @return string
     */
    public static function excelDate($date)
    {
        if (is_numeric($date)) {
            $date = (new \DateTime())->setDate(1900, 1, 1);
            return date('Y-m-d', $date->getTimestamp() - 28800);
        }
        return $date;
    }
}
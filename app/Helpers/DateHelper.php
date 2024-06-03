<?php

namespace App\Helpers;

class DateHelper
{
    public static function gregorianToHijri($year, $month, $day)
    {
        $jd = gregoriantojd($month, $day, $year);
        $hijri = self::jdToHijri($jd);
        return $hijri;
    }

    private static function jdToHijri($jd)
    {
        $jd = $jd - 1948440 + 10632;
        $n = (int) (($jd - 1) / 10631);
        $jd = $jd - 10631 * $n + 354;
        $j = ((int) ((10985 - $jd) / 5316)) * ((int) (50 * $jd / 17719)) + ((int) ($jd / 5670)) * ((int) (43 * $jd / 15238));
        $jd = $jd - ((int) ((30 - $j) / 15)) * ((int) (17719 * $j / 50)) - ((int) ($j / 16)) * ((int) (15238 * $j / 43)) + 29;
        $month = (int) (24 * $jd / 709);
        $day = $jd - (int) (709 * $month / 24);
        $year = 30 * $n + $j - 30;

        return [
            'year' => $year,
            'month' => $month,
            'day' => $day
        ];
    }
}

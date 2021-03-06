<?php

//namespace App\Custom\Classes;
namespace App\Custom;
class Helper
{
    /**
     * quantitative declension of the word in Russian
     * @param $number -number
     * @param $word1 - the number having the last digit 1 (1, 21...)
     * @param $word2 - the number with the last digit 2, 3, 4 (2, 23, 124...)
     * @param $word3 - the rest including 11, 12, 13, 14
     * @return mixed
     */

    public function inflection ($number, $word1, $word2, $word3)
    {
        $number10 = $number % 10;
        $number100 = $number % 100;

        if ($number100 > 4 && $number100 < 21) {
            $res = $word3;
        }
        elseif ($number10 == 1) {
            $res = $word1;
        }
        elseif ($number10 > 1 && $number10 < 5) {
            $res = $word2;
        }
        else {
            $res = $word3;
        }

        return $res;
    }

    /**
     * date translation from machine to Russian.
     * @param $dateTime - machine format
     * @param $format - date and time order
     * @param $case - choice of case: n - nominative, g - genitive
     * @param $offset - time zone offset
     * @return mixed
     */

    function getRusDate($dateTime, $format = '%DAYWEEK%, d %MONTH%, Y H:i', $case = 'n', $offset = 0)
    {
        $monthArray = array(
            'n' => ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'],
            'g' => ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря']
        );
        $daysArray = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье', 'август');

        $timestamp = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->timestamp;
        $timestamp += 3600 * $offset;

        $findArray = array('/%MONTH%/i', '/%DAYWEEK%/i');
        $replaceArray = array($monthArray[$case][date("m", $timestamp) - 1], $daysArray[date("N", $timestamp) - 1]);

        $format = preg_replace($findArray, $replaceArray, $format);

        return date($format, $timestamp);
    }
}
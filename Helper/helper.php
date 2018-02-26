<?php
namespace Helper;

/**
 * Helper
 */
class Helper
{
    public static function textCut($str, $length)
    {
        if (strlen($str) > $length) {
            $str = mb_substr($str, 0, $length + 1, 'UTF-8');
            $pos = strrpos($str, ' ');
            $str = mb_substr($str, 0, ($pos > 0) ? $pos : $length, 'UTF-8');
            $str = $str . "...";
        }
        return $str;
    }
    public static function shorten_string($string, $wordsreturned)
    {
        $retval = $string;
        $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
        $string = str_replace("\n", " ", $string);
        $array  = explode(" ", $string);
        if (count($array) <= $wordsreturned) {
            $retval = $string;
        } else {
            array_splice($array, $wordsreturned);
            $retval = implode(" ", $array) . " ...";
        }
        return $retval;
    }
}

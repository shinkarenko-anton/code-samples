<?php
//get longest palindrom from the string
$str = "12121 арген негра 2 аргентина манит негра";
$str = "Sum summus mus";

$pal = getMaxPalindrom(prepareString($str),strlen($str),0);
echo "<pre>";
var_dump($pal);
echo "</pre>";

function prepareString ($str){
    $str = mb_strtolower($str);
    $str = mb_ereg_replace(" ", "", $str);
    return $str;
}

function  invertString ($str) {
    $str = iconv("UTF-8", "windows-1251", $str);
    $str = strrev($str);
    $str = iconv("windows-1251", "UTF-8", $str);
    return $str;
}

function isPalindrom($str){
    if ($str == invertString($str)) {
        return true;
    } else {
        return false;
    }
}

function getMaxPalindrom($str,$len,$offset)
{
    if (($len-$offset) == 0) {
        return $arr;
    } else {

        for ($i=0; $i <= $offset ; $i++) {
            $substr = substr($str, $i,$len-$offset);

            if (isPalindrom($substr)) {
                return $substr;
            }

        }

        return getMaxPalindrom($str,$len,++$offset);
    }

}
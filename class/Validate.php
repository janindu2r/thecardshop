<?php

class Validate
{

public static function validString($string, $boolean)
{
    $valid = false;

    //check if string is valid

    return $valid;
}

public static function validInt($val)
{

    return $val;
}

public static function validateDecimal($val)
{
//float numbers to be truncated to two decimal points
    return $val;
}

public static function longText($txtAreaString)
{
//including apostrophes
    return $txtAreaString;
}

    public  function checkEmpty($text)
    {
        if(empty($text))
        {
            echo"field is empty";

        }
        else
            return $text;
    }
    public function  checkNumeric($text)
    {
        if(is_numeric($text))
        {
            return $text;
        }
        else
            echo"enter a number";
    }



}

?>
<?php

class Validate
{
    public static function validString($string)
    {
        $max = 30;
        if (preg_match('/[a-zA-Z]/', $string) === 0) {
            echo "Error";
        }
        else {
            $len = strlen($string);
            if ($len == 0)
                echo "Field is empty";
            else if ($len > $max)
                echo "Enter a name with less than 30 characters ";
            else
                echo "String is valid";
        }
    }

    public static function emailValidate($string)
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            echo "email is not valid" . "<br>";
        } else {
            echo "valid email" . "<br>";
        }
    }

    public static function validInt($val)
    {
        if (!preg_match("/{5}/", $val) === 0) ;
            echo "Enter a number with less than 5 digits" . "<br>";
    }

    public static function validNumber($val)
    {
        if (!preg_match("/[0-9]/", $val) === 0) ;
        echo "Enter a valid number" . "<br>";
    }

    public static function checkEmpty($text)
    {
        if (empty($text)) {
            echo "field is empty" . "<br>";

        } else
            return $text;
    }

    public static function checkNumeric($text)
    {
        if (is_numeric($text)) {
            return $text;
        } else
            echo "enter a number" . " <br>";
    }



    /*
    public static function longText($txtAreaString)
    {
        //including apostrophes
        return $txtAreaString;
    }

    public static function validateDecimal($val)
    {
        //float numbers to be truncated to two decimal points
        return $val;
    } */

}

?>
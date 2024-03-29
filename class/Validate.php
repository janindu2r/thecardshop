<?php
/* Validate Class
by: bmla
*/



class Validate
{
    public static function validString($string)
    {
        $max = 30;
        if (preg_match('/[a-zA-Z]/', $string) === 0) {
            return "Error";
        }
        else {
            $len = strlen($string);
            if ($len == 0)
                return "Field is empty";
            else if ($len > $max)
                return "Enter a name with less than 30 characters ";
            else
                return "String is valid";
        }
    }

    public static function emailValidate($string)
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL))
            return "Email is not valid" . "<br>";
         else
            return "Valid email" . "<br>";

    }

    public static function checkEmpty($text)
    {
        if (empty($text))
            return "Field is empty" . "<br>";
        else
            return $text;
    }

    public static function checkNumeric($text)
    {
        if (is_numeric($text))
            return $text;
        else
            return "Enter a number" . " <br>";
    }





}

?>
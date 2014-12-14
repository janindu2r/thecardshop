<?php

class Validate
{

public static function validImgFormat()
{

}

public  static function validString($string)
{
    $max = 30;
  if(!preg_match('/[a-zA-Z]/',$string))
  {
      echo "error";
  }
    $len = strlen($string);
    if($len == 0)
    {
        echo "filed is empty";
    }
    if($len > $max)

    {
        echo "enter a name with less than 30 characters ";
    }


   // $valid = false;

    //check if string is valid

/*
if($flag == true)
{
    echo $string;
    return $string;
}
   else
       echo"invalid name";
  //  return $valid;*/
}

public static function validInt($val)
{
    $id = 5;
    if(! preg_match("/{5}/",$val));
    {
        echo "enter a number with less than 5 digits"."<br>";
    }





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
            echo"field is empty"."<br>";

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
            echo"enter a number"." <br>";
    }

public static  function emailValidte($string)
{
    if(!filter_var($string,FILTER_VALIDATE_EMAIL))
    {
        echo "email is not valid"."<br>";
    }
    else
    {
        echo "valid email"."<br>";
    }


}

}

?>
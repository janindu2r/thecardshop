<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 include($path.'/internal.php');

$st = new Physical();

print_r($st->getAllVariations('1000001','1'));

$crtObj =  new Variations();

echo "<br><br><br>";

$variation = 0;
$prodId = 1000000;
$qty = 2;
if($variation)
{
        echo 'var';
}

/*
foreach($crtObj->returnAllVariationObjects('1000001', $st->varIdNames,$st->varNameValues ) as $varObject )
{
   foreach($varObject as $key => $val)
    {
        echo $key." : ";
        if(!is_array ($val) && !is_object($val))
            echo $val;
        echo "<br>";
    }
    echo "<hr>";
} */

?>
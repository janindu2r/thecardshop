<?php
class physical
{
private $width,$height,$length,$weight;

function setValue($newWidth)
{
	$this->width =  $newWidth;
}
function getValue()
{
return $this->width;	
}
function setValue1($newHeight)
{
	$this->height =  $newHeight;
}
function getValue1()
{
return $this->height;	
}

function setValue2($newLength)
{
	$this->length =  $newLength;
}
function getValue2()
{
return $this->length;	
}
function setValue3($newWeight)
{
	$this->weight =  $newWeight;
}
function getValue3()
{
return $this->weight;	
}
function outDimensions($pName,$wdth,$hght,$lngth,$wght)
{
	echo " name of the product: ".$pName."<br>";
echo " length is:".$wdth."<br>";
echo " height is:".$hght."<br>";
echo " width is :".$lngth."<br>";
echo " weight is:".$wght. "<br>";
	
	
}
	
	
	
}




?>
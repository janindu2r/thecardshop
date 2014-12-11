<?php
/*
variationtest class
Created on:2014-12-4
by:bmla

*/
include($_SERVER['DOCUMENT_ROOT'].'/internal.php');


//deleting a record
 $vNew = new Variation();
 /* $success = $vNew->deleteVariation(1000000,1);
 if($success == 1)
 {
	echo "deleted"."<br>"; 
	 
 }
 else
 {
	echo "its not deleted"."<br>"; 
	 
 } */
 
 //add a record
 
 $rec = new Variation();
 $flag = $rec->insertValues(insertValues("1000000","Color");
  if( $flag == 1)
  {
  echo "record inserted";
  
  }
  else
  
  echo "couldnt insert";


$dAll = new Variation();
/* $flag = $dAll->deleteAll();

if($flag ==1)
{
echo "deleted";	
}
else
echo"not deleted"; */


?>
<?php
/*
variationtest class
Created on:2014-12-4
by:bmla

*/
include('../class/dbcon.php');
include('../class/product.php');
include('../class/physical.php');
include('../class/Variation.php');



//deleting a record
 $vNew = new Variation();
 $success = $vNew->deleteVariation(1000000,1);
 if($success == 1)
 {
	echo "deleted"."<br>"; 
	 
 }
 else
 {
	echo "its not deleted"."<br>"; 
	 
 }
 
 //add a record
 
 $rec = new Variation();
 $flag = $rec->insertvalues(" 1000000 "," 1 "," color ");
  if( $flag == 1)
  {
  echo "record inserted";
  
  }
  else
  
  echo "couldnt insert";



?>
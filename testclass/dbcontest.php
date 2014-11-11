<?php
include('../class/dbcon.php');

/** Database Test Class 
created: 2014-11-11
by : JK;
lastEdited: 2014-11-11
by: JK;

Refer only to review DbConClass functionality in action
*/

try {
$a = new DbCon(); // create object

/*
// run insert query, print return value
$insert = array("reg_ID"=>"1", "email"=>"'janani@gmail.com'", "verified"=>"0", "password"=>"'janz'");	
printf ($a->runInsertRecord('account', $insert). " -> Insert Query Result<br>");

//directly run an insert query (runNonQuery Example)
printf ($a->runNonQuery("insert into account values( 110, 'u3m', 'ja', 1)") . " -> Non Query Result<br>");

$insert = array("password"=>"'jnz'");
//create and run update query
print ($a->runUpdateRecord('account', $insert, 'verified = 0'). " -> Update Query Result<br>");

//directly run update query (runNonQuery Example)
printf ($a->runNonQuery("update account set verified=0") . " -> Non Query Result<br>");
*/
 

//delete query

}
catch(Exception $dbEx){
	echo $dbEx->getMessage();
}


?>
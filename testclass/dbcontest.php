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
 

//run select statement to get first row as an associative array
$result = $a->getFirstRow("select * from account where reg_ID= 1");
if($result != 0)
{
	echo "The results from the first row from your query displayed in a table <br> <table>";
foreach ($result as $x=>$xval)
	echo "<tr><td>". $x . "</td><td>" . $xval . "</td></tr>";
echo "</table> <br><br>";
}
else
	echo "Your query did not retrieve any results <br>";

//run select statement to get first column first row value
$firstval =  $a->getScalar("select email from account") ;
if($firstval)
echo $firstval . " is the 1st column 1st row result from the select statement you ran <br>";
else
	echo "Your query did not retrieve any results <br><br>";





} 
catch(Exception $dbEx){
	echo $dbEx->getMessage();
}


?>
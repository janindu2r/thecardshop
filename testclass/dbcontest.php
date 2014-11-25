<?php
include('../class/dbcon.php');

/** Database Test Class 
created: 2014-11-11
by : JK;
lastEdited: 2014-11-19
by: JK;

Refer only to review DbConClass functionality in action
*/

try {
$a = new DbCon(); // create object

// run insert query, print return value
$insert = array("reg_id"=>"1", "email"=>"'janani@gmail.com'", "verified"=>"0",  "display_name"=>"'disp_name'", "password"=>"'password'");	
printf ($a->runInsertRecord('account', $insert). " -> Insert Query Result<br>");

//directly run an insert query (runNonQuery Example)
printf ($a->runNonQuery("insert into account values( 2, 'something@gmail.com', 'usern', 'pass', 0)") . " -> Non Query Result<br>");

$insert = array("password"=>"'upPass'");
//create and run update query
print ($a->runUpdateRecord('account', $insert, 'email = "something@gmail.com"'). " -> Update Query Result<br>");

//run update query created by passed parameters
print ($a->runUpdateOneValue('account', "password = 'SomePassWord'" , 'email = "something@gmail.com"'). " -> Update One Field Result<br>");

//directly run update query (runNonQuery Example)
printf ($a->runNonQuery("update account set verified=1") . " -> Non Query Result<br>");

echo "<br>";

//run select statement to get first row as an associative array
$result = $a->getFirstRow("select * from account where reg_id= 1");
if($result != 0)
{
	echo "The results from the first row from your query displayed in a table <br> <table  cellpadding='2' border='1'>";
foreach ($result as $x=>$xval)
	echo "<tr><td>". $x . "</td><td>" . $xval . "</td></tr>";
echo "</table> <br>";
}
else
	echo "Your query did not retrieve any results <br>";

//run select statement to get first column first row value
$firstval =  $a->getScalar("select email from account") ;
if($firstval)
	echo $firstval . " is the 1st column 1st row result from the select statement you ran <br><br>";
else
	echo "Your query did not retrieve any results <br><br>";


//run select statement to get a table, or return null , then loop through each row and echo the results inside html 
$b = $a->getSelectTable("select * from account");
		if($b){		
		echo "Your Select Query Table <table cellpadding='2' border='1'>";
		foreach($b as $row) {	
				echo  "<tr><td>" . $row['reg_id'] . "</td><td>" .$row['email'] . "</td><td>" . $row['password'] . "</td><td>" . 						$row['verified'] . "</td></tr>";
			}
		echo "</table>";
		}
		else
			echo "Query returned empty result set or is wrong.";


			
echo "<br>";			
//run delete query and return if successful		
	if($a->deleteRecords('account', 'email = "janani@gmail.com"'))
		echo "Delete Query Sucessful";
	else
		echo "Delete Query Not Sucessful";	

//sample escape string 
$varb = "Conon O'Brian %10 _134"; 
echo "<br><br>Escape String that says <b>". $varb ."</b> <br>Result ->  ";
echo $a->escapeString($varb) ; 


echo "<br>";	

					
} 
catch(Exception $dbEx){
	echo $dbEx->getMessage();
}




?>
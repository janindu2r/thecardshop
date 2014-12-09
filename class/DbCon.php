<?php
/* Database Class 
created: 2014-11-11
by : JK;
lastEdited: 2014-11-19
by: JK;
*/

class DbCon
{
	private $con; 
	
	// Constructor - Create object method and throw exception for connection errors */	
	function __construct() {
		try{
		include('aaa.php');	
	//	$this->con  = new PDO("mysql:host=localhost;dbname=elitecomercio", 'root', '');				
		}
		catch(PDOException $pdoE){
			 throw new Exception("Could not connect to the database. ". $pdoE->getMessage());
		}
	} 
	
	// Destructor - Close Connection 
	function __destruct() {
       unset($this->con);
	}		        	
	 
	/*-------- General Query Result Return Functions --------*/
	 
	/* Pass sql string as parameter, run query, return affected rows */
	function runNonQuery($sqlstring)
	{
		$result = $this->con->prepare($sqlstring);
		$sucess = $result->execute();
		if($sucess)
			return $result->rowCount();
		else
			return 0;
	}
	
	/* Get first Row of a query and return it in an associative array
	If no results were retrieved it will return 0 (null)
	*/
	function getFirstRow($sqlstring)
	{
		$result = $this->con->prepare($sqlstring);
		$sucess = $result->execute();
		if($sucess)
			return  $result->fetch(PDO::FETCH_ASSOC);	
		else
			return 0;
	}
	
	/* Get first column first row value of a query and return it
	If no results were retrieved it will return 0 (null)
	*/
	function getScalar($sqlstring)
	{
		$result = $this->con->prepare($sqlstring);
		$sucess = $result->execute();
		if($sucess)
			return $result->fetchColumn();	
		else
			return 0;
	}	
	
	/*Run select sql statement, return associative arrays per each row
	if the query is wrong or if there are no records to display the return would be 0 (null)
	*/
	function getSelectTable($sqlstring)
	{
	 	$result = $this->con->prepare($sqlstring);
		$success = $result->execute();
		if ($success && $result->rowCount() > 0)
			return  $result;
		else if (!$result)
			return 0;
	}	
	 
	/*-------- Insert related functions --------*/
		
	/* Private Function : create insert sql statement  */
    public function getInsertSql($tableName, $fields) 
	{	
		$dbfields ="";
		$dbvalues = "";	
		foreach($fields as $x=>$xval)
		{
			$dbfields .= ", ". $x;
			$dbvalues .= ", ". $xval ;
		}		
		$dbfields = substr($dbfields, 2);
		$dbvalues  = substr($dbvalues, 2);	
		$sql = "INSERT INTO ". $tableName. "(" . $dbfields . ")  values (". $dbvalues . ")";
		return $sql;
	}
	
	/* run simple insert query and return sucess result/affected rows
	parameter: $fields --> associative array of table fields as keys and  as value-of-each-field as keyvalues
	*/
	function runInsertRecord($tableName, $fields)
	{
		$result = $this->runNonQuery($this->getInsertSql($tableName, $fields));	
		return $result;	
	}
	
	/* Run insert query and get AutoIncrement ID if there is one, if not return 0
	parameter: $fields --> associative array of table fields as keys and  as value-of-each-field as keyvalues
	*/
	function runInsertAndGetID($tableName, $fields) 
	{
		$result = $this->runNonQuery($this->getInsertSql($tableName, $fields));
		if($result)
			return $this->con->lastInsertId(); 
		else
			return $result;
	}	
	
	/*-------- Update realted functions --------*/
	
	
	/* Private Function : update sql statement  */    
	private function getUpdateSql($tableName, $setValues, $whereClause ) 
	{
		$dbSetVals = "";
		
		foreach($setValues as $x=>$xval)
		{
			$dbSetVals .= ", ". $x . " = " . $xval ;
		}
		$dbSetVals = substr($dbSetVals, 2);	
		$sql = "UPDATE ". $tableName . " SET ". $dbSetVals . " WHERE " . $whereClause; 
		return $sql;
	}
	
	/* Run update query and return number of affected rows
	parameter: $setValues --> associative array of table fields as keys and update-values-of-each-field as keyvalue
	$whereClause --> Everything the sql condition must check (eg: field1 = value1 AND field2 = value2 OR field3 = value3)
	*/
	function runUpdateRecord($tableName, $setValues, $whereClause){
		$result = $this->runNonQuery($this->getUpdateSql($tableName, $setValues, $whereClause));
		return $result;	
	}
	
	/* Run update query and return if successful 
	parameter: $updateField --> " fieldname = 'value' "
	$whereClause --> Everything the sql condition must check (eg: field1 = value1 AND field2 = value2 OR field3 = value3)
	 */
	function runUpdateOneValue($tableName, $updateField, $whereClause){		
		$sql = "UPDATE ". $tableName . " SET ".  $updateField . " WHERE " . $whereClause; 
		$result = $this->runNonQuery($sql);
		return $result;	
	}
 
	
	/*-------- Delete function --------*/
	/* Run delete query and return boolean success 
	parameter: $tableName --> table to delete from
	$whereClause --> Everything the sql condition must check (eg: field1 = value1 AND field2 = value2 OR field3 = value3)
	*/
	function deleteRecords($tableName, $whereClause)
	{
		$result = $this->runNonQuery("DELETE FROM ". $tableName . " WHERE " . $whereClause);
		return $result;
	}
	
	/*-------- parameter validation --------*/
	/* Pass input variable and return the value with escaped strings */
   function escapeString($sqlPara)
   { 
	   return addcslashes($this->con->quote($sqlPara), '%_');
   }
   
   
}

?>

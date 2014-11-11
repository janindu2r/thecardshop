<?php
/* Database Class 
created: 2014-11-11
by : JK;
lastEdited: 2014-11-11
by: JK;
*/

class DbCon
{
	private $con; 
	
	// Constructor - Create object method and throw exception for connection errors */	
	function __construct() {
		$this->con  = new mysqli("localhost", "root", "", "elitecomercio");
		if ($this->con->connect_errno != 0){
			  throw new Exception("Could not connect to the database. \n". $this->con->connect_error);
		}
	} 
	
	// Destructor - Close Connection 
	function __destruct() {
       $this->con->close();
	}		   
     
	
	 
	/*-------- General Query Result Return Functions --------*/
	 
	/* Pass sql string as parameter, run query, return affected rows */
	function runNonQuery($sqlstring)
	{
		$result = $this->con->query($sqlstring);
		if($result)
			return $this->con->affected_rows;
		else
			return 0;
	}
	
	/*Get first Row of a query and return it in an associative array
	If no results were retrieved it will return 0 (null)
	*/
	function getFirstRow($sqlstring)
	{
		$result = $this->con->query($sqlstring);
		if($result)
			return  $result->fetch_assoc();	
		else
			return 0;
	}
	
	/*Get first column first row value of a query and return it
	If no results were retrieved it will return 0 (null)
	*/
	function getScalar($sqlstring)
	{
		$result = $this->con->query($sqlstring);
		if($result)
		{
			$assoc =  $result->fetch_row();
			return $assoc[0]; 	
		}
		else
			return 0;
	}
	
	function getSelectTable($sqlstring)
	{
	/*	$result = $this->con->multi_query($sqlstring);		
		if($result = $this->con->store_result())
		{
			while ($row = $result->fetch_row()) {
                printf("%s <br>", $row[0]);
				$this->con->next_result();
            }
            $result->free();
		}
		else 
			return 0; */
	}
	
	
	
	 
	/*-------- Insert related functions --------*/
		
	/* Private Function : create insert sql statement  */
    private function getInsertSql($tableName, $fields) 
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
			return $this->con->insert_id; 
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
  
	
	/*-------- Delete realted functions  --------*/
	
	function deleteRecords($tableName)
	{
		
		//DELETE FROM table_name
 //WHERE some_column = some_value
	}
  
  
}

?>
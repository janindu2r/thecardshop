<?php

/**User class
	created on: 2014/11/12
	author: aslam
	last edited: 2014/11/12
*/

class User
{
	var $regID;
	private $dispName;
	private $password;
	protected $address;
	protected $country;
	private $gender;
	private $dob;

	/*function __construct(argument)
	{
		# code...
	}`*/

	//start of getters and setters

	function setRegID($id)
	{
		this->$regID = $id;
	}
	function getRegID()
	{
		return this->$regID;
	}

	function setDispName($name)
	{
		this->$dispName = $name;
	}
	function getDispName()
	{
		return this->$dispName;
	}

	function setPassword($pass)
	{
		this->$password = $pass;
	}
	function getPassword()
	{
		return this->$password;
	}

	function setAddress($add)
	{
		this->$address = $add;
	}
	function getAddress()
	{
		return this->$address;
	}

	function setCountry($count)
	{
		this->$country = $count;
	}
	function getCountry()
	{
		return this->$country;
	}

	function setGender($gend)
	{
		this->$gender = $gend;
	}
	function getGender()
	{
		return this->$gender;
	}

	function setDob($date)
	{
		this->$dob = $date;
	}
	function getDob()
	{
		return this->$dob;
	}

	//end of getters and setters

	function login($disp, $pass)
	{
		$query = sprintf("SELECT * FROM account WHERE display_name='%s' and password='%s'",mysql_real_escape_string($disp), mysql_real_escape_string($pass));

		$dbcon = new DbCon();
		$result = $dbcon->getFirstRow($query);

		if($result != 0)
		{
			header('Location : profile.php');
		}
		else
		{
			header('Location : login.php');
		}

		$dbcon->__destruct();
		 
	}

	function registration($tbl, $details)
	{
		$con = new DbCon();

		$result = $con->runInsertRecord($tbl, $details);

		if($result)
			header('Location:  confirm.php');
		else
			header('Location:  registration.php');

		$con->__destruct();
	}

	function updateDetails($details, $clause)
	{
		$dbcon = new DbCon();
		$result = $dbcon->runUpdateRecord('user', $details, $clause);

		if($result != 0)
		{
			header('Location : profile.php');
		}
		else
		{
			header('Location : update.php');
		}

		$dbcon->__destruct();
	}


?>
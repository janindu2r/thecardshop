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

		if($disp==this->getDispName() && $pass==this->getPassword())
		{
			return 1;
		}
		else
			return 0;

		$query = sprintf("SELECT display_name FROM elitecomercio WHERE display_name='%s' and password='%s'",mysql_real_escape_string($disp), mysql_real_escape_string($pass));
		 
	}

	function registration1($details)
	{
		$con = new DbCon();

		$result = $con->runInsertRecord('account', $details);

		if($result)
			echo "Registration stage 1 complete";
		else
			echo "Unable to complete registration";
	}

	function registration2()
	{
		$con = new DbCon();


	}
}

?>
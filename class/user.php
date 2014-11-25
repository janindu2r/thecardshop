<?php

/**User class
	created on: 2014/11/12
	author: aslam
	last edited: 2014/11/12
*/

class User
{
	private $regID;
	private $dispName;
	private $password;
	protected $address;
	private $gender;
	private $dob;
	private $fname;
	private $lname;
	private $posrep;
	private $negrep;
	private $email;

	/*function __construct(argument)
	{
		# code...
	}`*/

	//start of getters and setters
	
	function getprofile()   //used in header.php 
	{
		return $this->fname.' '.$this->lname;
	}
	
	function setRegID($id)
	{
		$this->regID = $id;
	}
	function getRegID()
	{
		return $this->regID;
	}

	function setDispName($name)
	{
		$this->dispName = $name;
	}
	function getDispName()
	{
		return $this->dispName;
	}

	function setPassword($pass)
	{
		$this->password = $pass;
	}
	function getPassword()
	{
		return $this->password;
	}

	function setAddress($add)
	{
		$this->address = $add;
	}
	function getAddress()
	{
		return $this->address;
	}

	function setCountry($count)
	{
		$this->country = $count;
	}
	function getCountry()
	{
		return $this->country;
	}

	function setGender($gend)
	{
		$this->gender = $gend;
	}
	function getGender()
	{
		return $this->gender;
	}

	function setDob($date)
	{
		$this->dob = $date;
	}
	function getDob()
	{
		return $this->dob;
	}

	//end of getters and setters

	function login($disp, $pass)
	{
		$query = sprintf("SELECT * FROM account WHERE  (display_name='%s' or email='%s') and password='%s' and verified = 1",$disp, $disp, $pass);		
		$dbcon = new DbCon();
		$result= $dbcon->getFirstRow($query);
		if($result != 0)
		{
			$this->regID = $result['reg_id'];
			$this->dispName = $result['display_name'];
			$this->password = $result['password'];
			$this->email = $result['email'];
			$udetails = $dbcon->getFirstRow("select * from user where reg_id =".$this->regID);
			$this->fname = $udetails['fname'];
			$this->lname = $udetails['lname'];
			return 1;			
			//initiate rest of the variables
		}
		else
		{
			//handle return on index.php (redirect to login page)
			return 0;
		}

	}

	function registration($tbl, $details)
	{
		$con = new DbCon();

		$result = $con->runInsertRecord($tbl, $details);

		if($result)
			header('Location:  confirm.php');
		else
			header('Location:  registration.php');
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
	}
	
	
}

?>
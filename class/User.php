<?php

/**User class
	created on: 2014/11/12
	author: aslam
	last edited: 2014/11/12
*/

class User
{
	protected $regID;
	protected $dispName;
	protected $password;
	protected $address;
	protected $gender;
	protected $dob;
	protected $fname;
	protected $lname;
	protected $posrep;
	protected $negrep;
	protected $email;

    private $db;

    function __construct()
    {
        $this->db = new DbCon();
    }

    function validateEmail($string){
        $chars =  htmlspecialchars($string);
        if($chars != $string)
            return false;
        else {
            $val = $this->db->getScalar("SELECT COUNT(email)FROM account WHERE email =  ". $this->db->escapeString($string));
            if($val == 0)
                return true;
            else
                return false;
        }
    }

	function validateUserName($string) //Ajax validation upon user registration
	{
        $chars =  htmlspecialchars($string);
        if($chars != $string)
            return false;
        else {
            $val = $this->db->getScalar("SELECT COUNT(display_name) FROM account WHERE display_name =  ". $this->db->escapeString($string));
            if($val == 0)
                return true;
            else
                return false;
        }
	}
	
	function getProfile()   //used in header.php
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

	public function setDispName($name)
	{
		$this->dispName = $name;
	}
	public function getDispName()
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
		$result= $this->db->getFirstRow($query);
		if($result != 0)
		{
			$this->regID = $result['reg_id'];
			$this->dispName = $result['display_name'];
			$this->password = $result['password'];
			$this->email = $result['email'];
			$udetails = $this->db->getFirstRow("select * from user where reg_id =".$this->regID);
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
		$result = $this->db->runInsertRecord($tbl, $details);
/*
		if($result)
			header('Location:  confirm.php');
		else
			header('Location:  registration.php');*/
	}

	function updateDetails($details, $clause)
	{
		$result = $this->db->runUpdateRecord('user', $details, $clause);

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
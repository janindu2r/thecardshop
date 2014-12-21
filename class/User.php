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
    private  $gender;
    private  $dob;
    public $fName;
    public $lName;
	public $addressL1;
    public  $addressL2;
    public  $addressL3;
    public  $postalCode;
    public  $posRep;
    public  $negRep;
    public  $email;
    public $shop;

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
		return $this->fName.' '.$this->lName;
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

    function getAge()
    {
        $birthDate = explode("-", $this->dob);
        $today =  explode("-", date("Y-m-d"));
        $age = intval($today[0]) - intval($birthDate[0]);
        return $age;
    }

	//end of getters and setters

	function login($disp, $pass)
	{
		$query = sprintf("SELECT * FROM account WHERE  (display_name='%s' or email='%s') and password= md5('%s') and verified = 1",$disp, $disp, $pass);
		$result= $this->db->getFirstRow($query);
		if($result != 0)
		{
			$this->initializeUser($result);
            return 1;
		}
		else
		{
			return 0;
		}
	}

    function initializeUser($result)
    {
        $this->regID = $result['reg_id'];
        $this->dispName = $result['display_name'];
        $this->password = $result['password'];
        $this->email = $result['email'];
        $uDetails = $this->db->getFirstRow("select * from user where reg_id =". $this->regID);
        $this->fName = $uDetails['fname'];
        $this->lName = $uDetails['lname'];
        $this->dob = $uDetails['date_of_birth'];
        $this->gender = $uDetails['gender'];
        $this->addressL1 = $uDetails['deflt_billin_addl1'];
        $this->addressL2 = $uDetails['deflt_billin_addl2'];
        $this->addressL3 = $uDetails['deflt_billin_addl3'];
        $this->postalCode = $uDetails['postal_code'];
        $this->posRep = $uDetails['pos_rep_pnts'];
        $this->negRep = $uDetails['neg_rep_pnts'];
        $this->shop = $this->db->getScalar('select count(shop_id) from shops where shop_id = '. $this->regID);
    }


    function makeUser($id)
    {
        $query = sprintf("SELECT * FROM account WHERE user_id = " .$id);
        $result= $this->db->getFirstRow($query);
        if($result != 0)
        {
            $this->initializeUser($result);
        }
    }


    private function getEmail($regId, $userFullName){

        $email = '<div style="width: 80%; margin: 0 auto; padding: 20px;"><h2>Hello ';
        $email .= $userFullName .'!</h2><p style="text-align: center; color:#34495e; clear: both; margin: 0.5em;">Welcome to Comercio! ';
        $email .= 'An online ecommerce platform designed to provide the customer and seller the best online service possible</p><div style="padding: 2em;">';
        $email .= '<a title="Activate" style="text-decoration: none; color:#FFFFFF; padding: 1em 1.5em 1em 1.5em; border-radius: 0.5em; font-size: 1.2em; background-color: #557da1;"';
        $email .= 'href="http://comerciotest.com/activation.php?confirm='. md5((string)$regId) ;
        $email .= '">Activate Your Account</a></div></div>';

        return $email;
    }

    private function reeval($str)
    {
        return substr($str, 1, strlen($str)-2);
    }

    function registration(array $accDetails,array $userDetails)
    {
        $mailSuccess = false;
        $accDetails['verified'] = 0;
        $accDetails['registration_dnt'] =  $this->db->escapeString(date("Y-m-d H:i:s"));

        echo $this->db->getInsertSql('account', $accDetails);

        $getId = $this->db->runInsertAndGetID('account', $accDetails);

        if ($getId) {
        $userDetails['reg_id'] = $getId;
        $userDetails['pos_rep_pnts'] = 0;
        $userDetails['neg_rep_pnts'] = 0;

            echo $this->db->getInsertSql('user', $userDetails);

        $success = $this->db->runInsertRecord('user', $userDetails);

            if($success) {
                $to = $this->reeval($accDetails['email']);
                $regMail = new Email();
                $fullName = $this->reeval($userDetails['fname']) . ' ' . $this->reeval($userDetails['lname']);
                $mailSuccess = $regMail->sendMail($to, 'Registration', 'Welcome to Comercio', $this->getEmail($getId, $fullName));
            }
        }


        return $mailSuccess . $this->getEmail($getId,$fullName);
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
<?php

class Email
{	
	private function getCorrectEmail($department)  
	{
		return 'blogepistle@gmail.com';	//comercio email address
	}
	
	private function getFromName($department){
		return 'Comercio Team';		
	}

	function sendMail($to, $department, $subject, $body){
	
	$from =  $this->getCorrectEmail($department);
	$fromName = $this->getFromName($department);
	
	$headers = "From: ". $fromName ." <". $from .">" . "\r\n";
	$headers .= "Reply-To:" .$from. "\r\n" ."X-Mailer: PHP/" . phpversion();
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	
	$success = mail($to,$subject,$body,$headers);
	
	return $success;
	
	}

    //$department to define if the mail address should be chosen from comercio's multiple addresses
    function sendMailFromLocalhost($to, $department, $subject, $body)    //not working
    {
        $department = 'blogepistle@gmail.com';
        $depPass = 'hummerh5'; //get password depending on department

 //       require_once ("../scripts/Mail.php");
        $from =  $department; //our email address
        $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
        );

//        $sendm = new Mail();
 /*       $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => $department,
            'password' => $depPass
        ));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
            return  $mail->getMessage();
        } else {
           return true;
        }
*/
    }

}
?>
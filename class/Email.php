<?php
/* Email Class
by: JK;
*/


class Email
{
	private function getCorrectEmail($department)
	{
		return 'teamelitecomercio@gmail.com';	//Comercio email address
	}
	
	private function getFromName($department){
		return 'Comercio Team';		
	}
	
	function sendMail($to, $department, $subject, $body)
	{
		require_once 'mail/class.phpmailer.php';

		$from =  $this->getCorrectEmail($department);
		$fromName = $this->getFromName($department);

        $logo = '<html><div><img src="'.$_SERVER['DOCUMENT_ROOT'].'/img/logo/logo.png" style="width: 70px; display:inline-block;"><h1 style="display: inline-block; color: #3c763d;
vertical-align: text-bottom; padding: 3px;">Comercio</h1></div>';

		$mailer = new PHPMailer();
		$mailer->IsSMTP(true);		
		$mailer->IsHTML(true);		
		$mailer->SMTPAuth   = true;                  
		$mailer->Host       = "ssl://smtp.gmail.com"; 
		$mailer->Port       =  465;                   
		$mailer->Username   = $from; 
		$mailer->Password   = "teamelite";				
		$mailer->SetFrom($from, $fromName);
		$mailer->AddReplyTo($from,$fromName);
		$mailer->Subject    = $subject;
		$mailer->MsgHTML($logo.$body.'</html>');
		$address = $to;
		$mailer->AddAddress($address, $to);

        return $mailer->Send();
	}
	
	function sendSimpleMail($to, $department, $subject, $body){
	
	$from =  $this->getCorrectEmail($department);
	$fromName = $this->getFromName($department);
	
	$headers = "From: ". $fromName ." <". $from .">" . "\r\n";
	$headers .= "Reply-To:" .$from. "\r\n" ."X-Mailer: PHP/" . phpversion();
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	$success = mail($to,$subject,$body,$headers);
	
	if(!$success)
		$success = $this->sendMailFromMailer($to, $department, $subject, $body);
	
	return $success;
	
	}
	
}
?>
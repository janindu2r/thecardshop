<?php
/* Cart Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class Cart
{
	protected $userId;
	protected $db;
	
	function __construct() {
        $this->db = new DbCon();
		$this->userId = $_SESSION['user']->getRegID();
	} 
	
	function getCompleteCart()
	{
		
	}
	
	function getCartTotal()
	{
		
	}
	
	function getPortableCart()
	{
	}	  
   
}

?>

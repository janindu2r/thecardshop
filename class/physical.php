<?php
/*
created by :bmla
last edit:3-12-14

*/
class Physical extends Product

{
	
public $width,$height,$length,$weight,$shipCst,$multiByq;



function __construct()
{
	parent::__construct();	
}


public function selectPhysicalProduct($proID)
{		
		$this->returnProduct($proID);
		$view = $this->db->getFirstRow("select * from physical where prod_id = ".$this->prodId);
		$this->width = $view['width'];
		$this->height = $view['height'];
		$this->length = $view['length'];
		$this->weight = $view['weight'];
		$this->shipCst = $view['shipping_cost'];
		$this->multiByq = $view['multiply_byq'];
		return $this;	
}

//deleting a record

public function deletePhyProducts($pID)

{
	
		$delete = $this->db->runNonQuery("delete from physical where prod_id = ".$pID);
	return $delete;
	
	
	
	
	}
	public function initialize(array $assPhy)
	{   
	$this->prodId = $assPhy['prod_id'];
	$this->height = $assPhy['height'];
	$this->length = $assPhy['length'];
	$this->weight = $assPhy['weight'];
	$this->width = $assPhy['width'];
	$this->shipCst = $assPhy['shipping_cost'];
	$this->multiByq = $assPhy['multiply_byq'];
	return $this;
		
		
	}
	//inserting data
	
	public function insertValue($pPid,$pWidth,$pLength,$pHeight,$pWeight,$shipCost,$multi)
	{
		$assArry['prod_id'] = $this->db->escapeString($pPid);
	$assArry['width'] = $this->db->escapeString($pWidth);	
	$assArry['length'] = $this->db->escapeString($pLength);
	$assArry['height'] = $this->db->escapeString($pHeight);
	$assArry['weight'] = $this->db->escapeString($pWeight);
	$assArry['shipping_cost'] = $this->db->escapeString($shipCost);
	$assArry['multiply_byq'] = $this->db->escapeString($multi);
	return $this->addProduct($assArry);	
		
	}
	public function addProduct(array $assc)
	
	{
		
		$add = $this->db->runInsertRecord("physical",$assc);
	try
	{
		if($add == 1)
		{
		$this->initialize($assc);		
		return $this;
		}
		else
		return 0;
		
	}
	catch(Exception $e)
	{
	  echo $e->getMessage();	
	}
		
		
	}
	//update physical products
	
	public function updateProduct(array $value,$whereAs)
	{
		$pResult = $this->db->runUpdateRecord("physical",$value,$whereAs);
		return $pResult;
		
		
		
	}

	
	
	
}




?>
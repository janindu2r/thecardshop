<?php
/*
 *
 * created by JK & Bmla
 */

class Physical extends Product
{
    public $width,$height,$length,$weight,$shipCst,$multiByq;
    public $varNameValues = array();
    public $varIdNames = array();


    function __construct()
    {
        parent::__construct();
    }

	function getBadges(){
		$html = '<div style="padding: 5px;">';
		if($this->getMoneyBack())
			$html .= '<img src="/img/product/moneyback.png">';
		if($this->variation)
			$html .= '<img src="/img/product/variation.png">';
		if($this->shipCst == 0)
			$html .= '<img src="/img/product/shipfree.png">';
		return $html.'</div>';
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

    public function getAllVariations($pmProdId)
    {
        $this->selectPhysicalProduct($pmProdId);
        if($this->variation) {
            $sqlVar = 'select * from variations where prod_id = ' . $this->prodId . ' order by variation_id';
            $varItems = $this->db->getSelectTable($sqlVar);
            if ($varItems) {
                foreach ($varItems as $row) {
                    $this->varIdNames[$row['variation_id']] = $row['var_name'];
                    $this->varNameValues[$row['var_name']] = array();
                    $sqlVarV = 'select variation_value from variation_values where prod_id = ' . $this->prodId . ' and variation_id = ' . $row['variation_id'] . ' order by variation_value';
                    $varValueList = $this->db->getSelectTable($sqlVarV);
                    if ($varValueList) {
                        foreach ($varValueList as $itm) {
                            array_push($this->varNameValues[$row['var_name']], $itm['variation_value']);
                        }
                    }
                }
            }
        }
        return $this->varNameValues;
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


public function updateProduct(array $value,$whereAs)
	{
		$pResult = $this->db->runUpdateRecord("physical",$value,$whereAs);
		return $pResult;
		
		
		
	}
	
	public function deletePhyProducts($pID)
{
	
		$delete = $this->db->runNonQuery("delete from physical where prod_id = ".$pID);
	return $delete;
}

	
	
	
}




?>
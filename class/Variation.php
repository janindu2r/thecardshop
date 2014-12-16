<?php
/* Updated */


class Variation extends Physical
{
    public $varNames = array(); //var ID and var Name (1 : Color, 2: Size)
    public $allVars = array(); //var ID and the particular values of the specific variation item (1 : Blue, 2 : Medium)
	public $pId,$vId,$vName;
	function __construct()
	{
		parent::__construct();	
	}

    public function getVarName($varId)
    {
        $sqlVarN = 'select var_name from variations where prod_id = '. $this->prodId . ' and variation_id = '.$varId;
        $varName = $this->db->getScalar($sqlVarN);
        if($varName)
            return $varName;
        return $varName;
    }

	public function initializeVariation($pmProdId, array $vars)
	{
		$this->selectPhysicalProduct($pmProdId);
        foreach($vars as $key => $val)
        {
            $this->allVars[$key] = $val;
            $this->varNames[$key] = $this->getVarName($key);
        }
        return $this;
	}


	function getLargeBoxItem($prodId)
	{
		return $this->getThumbnailBoxItem($prodId, 4);
	}

	function getSmallBoxItem($prodId)
	{
		return $this->getThumbnailBoxItem($prodId, 3);
	}



	private function getThumbnailBoxItem($prodId, $col)
	{
		$size = 8 - $col;
		$this->returnProduct($prodId);
		$itemHtml  =  '<div class="col-sm-'.$col.'"><div class="col-item"><div class="photo"><img src="/content/products/prodthumbnail/';
		$itemHtml .= $this->prodId .'.jpg" class="img-responsive" alt="a" /></div><div class="info"><div class="row">';
		$itemHtml .= '<div class="price col-md-6"><h'.$size.'><b>'.$this->proName.'</b></h'.$size.'> by <a href="/viewshop.php?shop='.$this->shopId.'">';
		$itemHtml .= $this->getShopName() .'</a> </div><div class="rating hidden-sm col-md-6">';
		$itemHtml .= '<h4 class="price-text-color">$'.$this->proPrice.'<br>'.$this->getBadges() .'</h4>';
		$itemHtml .= '</div></div><div class="separator clear-left"><p class="btn-details">';
		$itemHtml .= '<a href="/viewproduct.php?product='. $this->prodId . '" class="btn btn-default">';
		$itemHtml .= '<span class="glyphicon glyphicon-list"></span> More details</a></p></div><div class="clearfix"></div></div>';
		$itemHtml .= '</div></div>';
		return $itemHtml;
	}

	
	public function deleteVariation($pId,$vId)
	{
	    $del = $this->db->runNonQuery(" delete from variations where prod_id = ".$pId." and variation_id = " .$vId);
		return $del;
	}
	
	
	
	//inserting variations
	
	public function addVariations(array $assVar)
	{
		$newVar = $this->db->runInsertRecord("variations",$assVar);
	try
	{
		if($newVar == 1)
		{
		$this->initialize($assVar);		
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
	
	public function insertvalues($pId,$vNam)
	{

		$variation['prod_id'] = $this->db->escapeString($pId);
		//$variation['variation_id'] = $this->db->escapeString($vId);
				//$variation['variation_id'] = max($variation['variation_id'] + 1);
		$variation['var_name'] = $this->db->escapeString($vNam); 
		return $this->addVariations($variation);
		
		
		
	}
	
	public function initialize(array $assArr)
	{
		$this->pId = $assArr['prod_id'];
		$this->vId = $assArr['variation_id'];
		$this->varNames = $assArr['var_name'];
		return $this;
		
		
	}
	//inserting variation values
	public function insertVarValues($pid,$vId,array $val,$vImg,$stck,$del)
	{
		
		foreach($val as $value)
		{
			
			$sql = " insert into variation_values(variation_value) values('$value') ";
		}
		unset($value);
	$array["prod_id"] = $this->db->escapeString($pid);	
	$array["variation_id"] = $this->db->escapeString($pid);	
	
	$array["var_img"] = $this->db->escapeString($pid);
	$array["current_stock"] = $this->db->escapeString($pid);
	$array["deleted"] = $this->db->escapeString($pid);	
	}



public function deleteAll()
{
	
	$del = $this->db->runNonQuery("update variations  set delete= '1' where delete = '0'");
	return $del;
	
}
}

?>
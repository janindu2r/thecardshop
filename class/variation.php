<?php

class Variation extends Physical
{
    protected $varNames = array(); //var ID and var Name (1 : Color, 2: Size)
    protected $allVars = array(); //var ID and the particular values of the specific variation item (1 : Blue, 2 : Medium)
    


	function __construct()
	{
		parent::__construct();	
	}

    public function getVarName($varId)
    {
        $sqlVarN = 'select var_name from variations where prod_id = '. $this->ownerProd . ' and variation_id = '.$varId;
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
	//delete variations
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
		$this->initializeVariation($proId,$assVar);		
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
	
	public function insertvalues($pId,$vId,$vNam)
	{
		$variation['prod_id'] = $this->db->escapeString($pId);
		$variation['variation_id'] = $this->db->escapeString($vId);
		$variation['var_name'] = $this->db->escapeString($vNam); 
		return $this->addVariations($variation);
		
		
		
	}
	
	
	

}

?>
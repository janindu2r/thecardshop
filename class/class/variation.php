<?php

class Variation extends Physical
{
    public $varNames = array(); //var ID and var Name (1 : Color, 2: Size)
    public $allVars = array(); //var ID and the particular values of the specific variation item (1 : Blue, 2 : Medium)

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
	
	public function deleteVariation($pId,$vId)
	{
	    $del = $this->db->runNonQuery(" delete from variations where prod_id = ".$pId." and variation_id = " .$vId);
		return $del;
	}

}

?>
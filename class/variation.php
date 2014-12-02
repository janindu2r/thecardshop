<?php


class Variations extends Physical
{
    protected $varId;
    protected  $varName;
    protected  $varValue;
	
	function __construct()
	{
		parent::__construct();	
	}

    public function getVariationName()
    {
        $sqlVarN = 'select var_name from variations where prod_id = '. $this->prodId;
        $varValue = $this->db->getScalar($sqlVarN);
        return $varValue;
    }

	public function initializeVariation($pmProdId, $variId, $variVal)
	{
		$this->selectPhysicalProduct($pmProdId);
        $this->varId = $variId;
        $this->varValue = $variVal;
        $this->varName = getVariationName();

        return $this;
	}

    public function returnAllVariationObjects($nProdId, array $names, array $vals)
    {
        $allVariations = array();
        foreach($names as $key => $varval)
        {
            foreach($vals[$varval] as $obj)
            {
                $varObj = new self();
                $varObj->selectPhysicalProduct($nProdId);
                $varObj->varId = $key;
                $varObj->varName = $varval;
                $varObj->varValue = $obj;
                array_push($allVariations, $varObj);
            }
        }
        return $allVariations;
    }

}


?>
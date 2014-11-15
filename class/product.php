
<?php



class product
{
	
public $prodId, $proName,$proImg, $proPrice,$sell_Unit,$description,$stock;
public $db;
function __construct()
{
	try
	{
		$this->db = new DbCon();
	}
	catch(Exception $e)
	{
		echo "".$e->getMessage();
	}
	
}

	public static function selectProduct($proid)
	{
		$instance = new self();
		$db = new DbCon();
		$num = $db->getFirstRow("select * from products where product_ID =".$proid);
	$instance->proName = $num['product_fname'];
	$instance->proImg = $num['default_img_loc'];
	$instance->proPrice = $num['price'];
	$instance->sellUnit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	public static function addProduct(array $assArr)
	{
		$instance = new self();
		$db = new DbCon();
		$assArr = $db->runInsetRecord($table,$fields);
		$instance->proId = $assArr['product_id'];
		$instance->proName = $assArr['product_name'];
		$instance->proPrice = $assArr['product_price'];
		$instance->description = $assArr['description'];
		$instance->sellUnit = $assArr['selling_unit'];
		$instance->prodImg = $assArr['default_img_loc'];
		return $instance;
	}
	
}

?>

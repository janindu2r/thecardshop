
<?php



class product
{
	
public $prod_ID, $pro_name,$pro_img, $pro_price,$sell_unit,$description,$stock;
public $db;
function __construct()
{
	try
	{
		$this->db = new dbcon();
	}
	catch(Exception $e)
	{
		echo "".$e->getMessage();
	}
	
}

	public static function selectProduct($proid)
	{
		$instance = new self();
		$db = new dbcon();
		$num = $db->getFirstRow("select * from products where product_ID =".$proid);
	$instance->pro_name = $num['product_fname'];
	$instance->pro_img = $num['default_img_loc'];
	$instance->pro_price = $num['price'];
	$instance->sell_unit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	public static function addProduct(array $assArr)
	{
		$instance = new self();
		$db = new dbcon();
		$assArr = $db->runInsetRecord($table,$fields);
		$instance->pro_name = $assArr['product_id'];
		
	}
	
}

?>

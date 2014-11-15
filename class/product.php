
<?php



class product
{
	
public $prod_Id, $pro_Name,$pro_Img, $pro_Price,$sell_Unit,$description,$stock;
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
		$db = new DbCon();
		$num = $db->getFirstRow("select * from products where product_ID =".$proid);
	$instance->pro_Name = $num['product_fname'];
	$instance->pro_Img = $num['default_img_loc'];
	$instance->pro_Price = $num['price'];
	$instance->sell_Unit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	public static function addProduct(array $assArr)
	{
		$instance = new self();
		$db = new dbcon();
		$assArr = $db->runInsertRecord('product', $assArr);
		$instance->pro_Id = $assArr['product_id'];
		$instance->pro_Name = $assArr['product_name'];
		$instance->pro_Price = $assArr['product_price'];
		$instance->description = $assArr['description'];
		$instance->sell_Unit = $assArr['selling_unit'];
		$instance->pro_Img = $assArr['product_img'];
		return $instance;
	}
	
}

?>


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
		echo $e->getMessage();
	}
	
}

	public static function selectProduct($proid)
	{
		$instance = new self();
		$db = new DbCon();
		$num = $db->getFirstRow("select * from products where product_id =".$proid);
	$instance->proName = $num['product_title'];
	$instance->proImg = $num['default_img_loc'];
	$instance->proPrice = $num['price'];
	$instance->sell_Unit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	public static function addProduct(array $assArr)
	{
		$instance = new self();
		$db = new DbCon();
		
       
		
		$new = $db->runInsertRecord('products',$assArr);
		try
		{
			if($new = 0)
			{
				
		$instance->prodId = $assArr['product_id'];
		$instance->proName = $assArr['product_title'];
		$instance->proPrice = $assArr['price'];
		$instance->description = $assArr['description'];
		$instance->sell_Unit = $assArr['selling_unit'];
		$instance->proImg = $assArr['default_img_loc'];
		return $instance;
		}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			
		}
	}
	
	
	
	//a costructor for addProduct method
	
	function insertproduct($prodId,$proName,$proPrice,$sell_Unit,$description,$proImg,$stock)
	{
	$asscArry['product_id'] = $prodId;	
	$asscArry['product_title'] = $proName;
	$asscArry['price'] = $proPrice;
	$asscArry['selling_unit'] = $sell_Unit;
	$asscArry['description'] = $description;
	$asscArry['stock'] = $stock;
	return $asscArry;
		
		
		
	}
	
	
	
	
	
	
	//viewing a selected product
	  function viewProduct($prodName)
	{
		
		$db = new DbCon();
		
		$view = $db->getFirstRow("select * from products where product_title =".$prodName);
	
		$this->prodId = $view["product_id"];
		$this->proName = $view["product_title"];
		$this->proPrice = $view["price"];
		$this->proImg = $view["defualt_img_loc"];
		$this->sell_Unit = $view["selling_unit"];
		$this->description = $view["product_desc"];
		return $this;
		
	}
	
}

?>

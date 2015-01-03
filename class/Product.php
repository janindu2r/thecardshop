<?php
/* Product Class
by: Bmla & JK
*/
class Product
{

	public $prodId, $proName, $proTag, $proPrice, $sellUnit, $description, $inStock, $cuStock, $shopId, $catId, $variation, $virtual, $pPoints, $nPoints, $dates, $del;
	public $db;
	public $prodImages = array();
	public $prodImPath = '/content/products/prodimages/';

	function __construct()
	{
		try {
			$this->db = new DbCon();
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}

	public function initializeProduct($prodArray)
	{

		if ($prodArray) {
			$this->prodId = $prodArray['product_id'];
			$this->shopId = $prodArray['shop_id'];
			$this->proName = $prodArray['product_title'];
			$this->description = $prodArray['product_desc'];
			$this->proTag = $prodArray['product_tag'];
			$this->catId = $prodArray['category_id'];
			$this->proPrice = $prodArray['price'];
			$this->variation = $prodArray['variations'];
			$this->virtual = $prodArray['virtual'];
			$this->sellUnit = $prodArray['selling_unit'];
			$this->pPoints = $prodArray['pos_rep_points'];
			$this->nPoints = $prodArray['neg_rep_points'];
			$this->inStock = $prodArray['initial_stck'];
			$this->cuStock = $prodArray['current_stck'];
			$this->dates = $prodArray['date_added'];
			$this->del = $prodArray['deleted'];
			$this->getImages();
			return $this;
		} else
			return 0;
	}

	public function returnProduct($productID)
	{
		$selectArray = $this->db->getFirstRow("select * from products where product_id = " . $this->db->escapeString($productID));
		return $this->initializeProduct($selectArray);
	}

	public function addProduct(array $asArrProd)
	{
		$new = $this->db->runInsertAndGetID("products", $asArrProd);
		if ($new) {
			$asArrProd['product_id'] = $new;
			$obj = $this->initializeProduct($asArrProd);
			return $obj;
		} else
			return 0;
	}

	public function insertValues($sId, $pTitle, $pTag, $cId, $pPrice, $pDesc, $pVartns, $pVirtual, $pSelUnits, $Stock)
	{
		$asscArry['shop_id'] = $this->db->escapeString($sId);
		$asscArry['product_title'] = $this->db->escapeString($pTitle);
		$asscArry['product_tag'] = $this->db->escapeString($pTag);
		$asscArry['category_id'] = $this->db->escapeString($cId);
		$asscArry['price'] = $this->db->escapeString($pPrice);
		$asscArry['product_desc'] = $this->db->escapeString($pDesc);
		$asscArry['variations'] = $this->db->escapeString($pVartns);
		$asscArry['virtual'] = $this->db->escapeString($pVirtual);
		$asscArry['selling_unit'] = $this->db->escapeString($pSelUnits);
		$asscArry['pos_rep_points'] = '0';
		$asscArry['neg_rep_points'] = '0';
		$asscArry['initial_stck'] = $this->db->escapeString($Stock);
		$asscArry['current_stck'] = $this->db->escapeString($Stock);
		$asscArry['date_added'] = $this->db->escapeString(date('Y-m-d'));
		$asscArry['deleted'] = '0';

		return $this->addProduct($asscArry);

	}

//delete method
	public function deleteProduct($pId)
	{
		$deleteRec = $this->db->runNonQuery("delete from products where product_id = " . $pId);
		return $deleteRec;
	}





	public function updateProduct(array $setValue, $wheres)
	{
		$result = $this->db->runUpdateRecord('products', $setValue, $wheres);
		return $result;
	}


//viewing products
	public function viewProducts($pId)
	{
		$view = $this->db->getFirstRow(" select * from products where product_id  = " . $pId . "and deleted = 0");
		$this->prodId = $view['product_id'];
		$this->shopId = $view['shop_id'];
		$this->proName = $view['product_title'];
		$this->proTag = $view['product_tag'];
		$this->catId = $view['category_id'];
		$this->proPrice = $view['price'];
		$this->description = $view['product_desc'];
		$this->variation = $view['variations'];
		$this->virtual = $view['virtual'];
		$this->sellUnit = $view['selling_unit'];
		$this->pPoints = $view['pos_rep_points'];
		$this->nPoints = $view['neg_rep_points'];
		$this->inStock = $view['initial_stck'];
		$this->cuStock = $view['current_stck'];
		$this->dates = $view['date_added'];
		$this->del = $view['deleted'];
		return $this;
	}

//function to gain the product id
	public function getProductId($pName)
	{
		$res = $this->db->getFirstRow("select product_id from products");
		$this->prodId = $res['product_id'];
		return $this;
	}

	function getShopName()
	{
		$shopName = $this->db->getScalar("select shop_name from shops where shop_id = " . $this->shopId);
		return $shopName;
	}

	function getImages(){
		$imLoop = $this->db->getSelectTable('select image_id from product_images where prod_id = '.$this->prodId);
		if($imLoop) {
			foreach ($imLoop as $row)
				array_push($this->prodImages, $this->prodId . sprintf('%02d', $row['image_id']));
		}
	}

	function insertImage(){
		$maxImg = intval($this->db->getScalar('select max(image_id) from product_images where prod_id = '.$this->prodId));
		$maxImg++;
		$arr['prod_id'] = $this->prodId;
		$arr['image_id'] = $maxImg;
		$this->db->runInsertRecord('product_images', $arr);
		array_push($this->prodImages, $this->prodId.sprintf('%02d',$maxImg));
		return $this->prodImPath.$this->prodId.sprintf('%02d',$maxImg).'.jpg';
	}

	private function getCartButton()
	{
		$itemHtml = '';
		if(isset($_SESSION['user'])) {
			if($_SESSION['user']->getRegID() == $this->shopId) {
				$itemHtml = '<p class="btn-add"><a href="/customizeproduct.php?product='. $this->prodId ;
				$itemHtml .= '" class="btn btn-success">';
				$itemHtml .= '<span class="glyphicon glyphicon-check"></span> Edit Product</a></p>';
			}
			else{
				$itemHtml = '<p class="btn-add"><button id="'. $this->prodId;
				$itemHtml .= '" class="add-one-to-cart btn btn-success">';
				$itemHtml .= '<span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</button></p>';
			}
		}
		return $itemHtml;
	}

	function getLargeBoxItem($prodId)
	{
		return $this->getThumbnailBoxItem($prodId, 4);
	}

	function getSmallBoxItem($prodId)
	{
		return $this->getThumbnailBoxItem($prodId, 3);
	}

	function getBadges()
	{
		$html = '<div style="padding: 5px;">';
		if($this->getMoneyBack())
			$html .= '<img src="/img/product/moneyback.png">';
		if($this->virtual)
			$html .= '<img src="/img/product/virtual.png">';
		return $html.'</div>';
	}

	function getMoneyBack(){
		return $this->db->getScalar('select mony_back_gurantee from shops where shop_id = ' . $this->shopId);
	}

	function getCategory()
	{
		return $this->db->getScalar('select category_name from categories where category_id = ' . $this->catId);
	}

	function getTotalSales()
	{
		$sql = 'SELECT  COUNT( order_id ) FROM product_order_items where product_id = '. $this->prodId .' GROUP BY product_id';
		return $this->db->getScalar($sql);
	}

	private function getThumbnailBoxItem($prodId, $col)
	{
		$size = 8 - $col;
		$this->returnProduct($prodId);
		$itemHtml  =  '<div class="col-sm-'.$col.'"><div class="col-item"><div class="photo"><img src="/content/products/prodthumbnail/';
		$itemHtml .= $this->prodId .'.jpg" class="img-responsive" alt="a" /></div><div class="info"><div class="row">';
		$itemHtml .= '<div class="price col-md-6"><h'.$size.'><b>'.$this->proName.'</b></h'.$size.'> by <a href="/viewshop.php?shop='.$this->shopId.'">';
		$itemHtml .= $this->getShopName() .'</a></div><div class="rating hidden-sm col-md-6">';
		$itemHtml .= '<h4 class="price-text-color">$'.$this->proPrice.'<br>'.$this->getBadges().'</h4>';
		$itemHtml .= '</div></div><div class="separator clear-left">';
		$itemHtml .= $this->getCartButton() . '<p class="btn-details">';
		$itemHtml .= '<a href="/viewproduct.php?product='. $this->prodId . '" class="btn btn-default">';
		$itemHtml .= '<span class="glyphicon glyphicon-list"></span> More details</a></p></div><div class="clearfix"></div></div>';
		$itemHtml .= '</div></div>';
		return $itemHtml;
	}


}





?>
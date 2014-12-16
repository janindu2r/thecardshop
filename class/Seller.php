<?php
/*
	Seller class
	Author : Aslam
	Created : 2014-11-18
*/
	
	class Seller
	{
        public $shopId;
		public $shopName;
		public $shopDesc;
		private $paypalEmail;
		public $logoImg;
        public $shopSlider = array();
		public $posRep;
        public $negRep;
        public $moneyback;
        public $shopLoc;
        private $db;
        public  $categories = array();
        public $comPath =  '/content/shop/slider/' ;

		function __construct($shopId)
		{
            $this->db = new DbCon();
            $this->shopId = $shopId;
            $this->comPath .= $this->shopId;
		}

        function getCategories()
        {
            $sql = "SELECT c.category_id AS id, c.category_name AS name FROM categories c JOIN shop_categories s ON s.category_id = c.category_id WHERE s.shop_id = ";
            $sql .= $this->shopId;
            $arr = $this->db->getSelectTable($sql); //getting category ids
            if($arr) {
                foreach ($arr as $row)
                    $this->categories[$row['id']] = $row['name'];
            }
        }

        function insertSeller($shop, $cat)
        {
            $shop['shop_id'] = $this->db->escapeString($this->shopId);
            $shop['pos_rep_pnts'] = 0;
            $shop['neg_rep_pnts'] = 0;
            $shop['activated_date'] = $this->db->escapeString(date("Y-m-d"));

            if($shop['paypal_acc_email'] == '')
                $shop['paypal_acc_email'] = $this->db->escapeString($_SESSION['user']->email);

            $success = $this->db->runInsertRecord('shops', $shop);

            if ($success) {
                $_SESSION['user']->shop = 1;
                $categories = explode(" | ", $cat);
                $catIds = array();

                foreach ($categories as $val) {
                    $catId = $this->db->getScalar("select category_id from categories where category_name = " . $this->db->escapeString($val));
                    if ($catId == null) {
                        $arr['category_name'] = $this->db->escapeString($val);
                        $catId = $this->db->runInsertAndGetID('categories', $arr);
                    }
                    if (!in_array($catId, $catIds) && $catId != null)
                        array_push($catIds, $catId);
                }

                $insertCat['shop_id'] = $this->shopId;
                foreach ($catIds as $newVal) {
                    $insertCat['category_id'] = $newVal;
                    $this->db->runInsertRecord('shop_categories', $insertCat);
                }
                $this->initiate();
                return 1;
            }
        }

        function productCount()
        {
            $sql = 'SELECT COUNT( product_id ) FROM products WHERE shop_id ='. $this->shopId;
            return $this->db->getScalar($sql);
        }

        function salesCount(){ //tobe implemented

            return '10';
        }

        function initiate()
        {
            $shopDetails = $this->db->getFirstRow("select * from shops where shop_id = " . $this->shopId);
            $this->shopName = $shopDetails['shop_name'];
            $this->shopDesc = $shopDetails['shop_desc'];
            $this->shopLoc = $shopDetails['shop_base_loc'];
            $this->moneyback = $shopDetails['mony_back_gurantee'];
            $this->paypalEmail = $shopDetails['paypal_acc_email'];
            $this->posRep = $shopDetails['pos_rep_pnts'];
            $this->negRep = $shopDetails['neg_rep_pnts'];
            //  $shopDetails['paypal_id_token']
            $this->logoImg = '/content/shop/logo/' . $this->shopId . '.jpg';
            $this->getCategories();
            $this->getSliderImages();
            return $shopDetails;
        }


        function getSliderImages()
        {
            $sql = "SELECT image FROM shop_gallery where shop_id = ". $this->shopId;
            $arr = $this->db->getSelectTable($sql);
            if($arr) {
                foreach ($arr as $row)
                    array_push($this->shopSlider, $this->comPath.$row['image'].'.jpg');
            }
        }


        public function getShopProducts($limStart, $limEnd)
        {
            $query = " select product_id, variations from products where shop_id = " . $this->shopId . ' order by product_id desc limit ' . $limStart . ',' . $limEnd;
            $res = $this->db->getSelectTable($query);
            return $res;
        }


        /*
		function manageShop($details, $category)
		{
			//$details stores the form data received via POST and is passed here
			$db = new DbCon();
			$result = $db->runInsertRecord('shops', $details);
			if($result)
				header('Location:  profile.php');
			else
				header('Location:  manageShops.php');
			$newDetails['shopID'] = $details['shopID'];
			$newDetails['categoryID'] = $category;
			$newResult = $db->runInsertRecord('shop_categories', $newDetails);
		} */
	}

?>
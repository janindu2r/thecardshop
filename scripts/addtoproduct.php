<?
include ('overhead.php');

$db = new DbCon();

$pId = $_POST['prod_ID'];
$sId = $_POST['shop_ID'];
$pTag = $_POST['pro_tag'];
$pName = $_POST['pro_name'];
$cID = $_POST['catId'];
$pDesc = $_POST['description'];
$pPrice = $_POST['pro_price'];
$sell = $_POST['sel_unit'];

$variation = $_POST['var'];
$virtual = $_POST['vir'];

$ppoints = $_POST['pPoints'];
$npoints = $_POST['nPoints'];
$iStock = $_POST['iStock'];
$cStock = $_POST['cStock'];
$date = $_POST['pDate'];

$object = new Product();
$del = 0;
$next = $object->insertValues($pId,$sId,$pName,$pTag,$cID,$pPrice,$pDesc,$variation,$virtual,$sell,$ppoints,$npoints,$iStock,$cStock,$date,$del);


header('Location: ../viewproduct.php');

?>
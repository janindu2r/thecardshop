<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');
$user = $_SESSION['user'];

$shopowner = $user->getRegID();

/* function out_errors($error)
{
echo'<ul><li>',$error.'</li></ul>';	
	
} */
$db = new DbCon();
if($_POST)
{


//$sId = mysql_real_escape_string(strip_tags($_POST['shopID']));
$pTag = $db->escapeString ($_POST['pro_tag']);
$pName = $db->escapeString ($_POST['pro_name']);
$cID =$db->escapeString ($_POST['category']);
$pDesc = $db->escapeString ($_POST['description']);
$pPrice =$db->escapeString ( $_POST['pro_price']);
$sell = $db->escapeString ($_POST['sel_unit']);

$variation = $db->escapeString ($_POST['var']);
$virtual =$db->escapeString  ($_POST['vir']);


$iStock = $db->escapeString ($_POST['Stock']);
//$cStock = mysql_real_escape_string(strip_tags($_POST['Stock']));
//$date = mysql_real_escape_string(strip_tags($_POST['pDate']));
$pic_tmp = $_FILES['img']['tmp_name'];
$pic_name = $_FILES['img']['name'];
$pic_name = $_FILES['img']['type'];
$allowed_type =array( 'image/jpg','image/png');



$object = new Product();
$del = 0;
$object = $object->insertValues($shopowner ,$pName,$pTag,$cID,$pPrice,$pDesc,$variation,$virtual,$sell,$iStock,$date,$del);


/*

if(in_array($pic_name,$allowed_type))
{
	$paths = '/content/products/simpleprod/'.$pic_name;
	
}
if(empty($pic_name))
{
	$defImgName = '1000000.jpg';
  $paths = '/content/products/prodthumbnail/'.$defImgName;	
}



move_uploaded_file($pic_tmp,$paths); */

if($object)
{
header('Location:/viewproduct.php?product='. $object->prodId);
}
else
    echo "error";



}











/*
print_r($_POST);
//form validation
if(in_array($pic_name,$allowed_type))
{
	$paths = '/content/products/simpleprod/'.$pic_name;
	
}
if(empty($pic_name))
{
	$defImgName = '1000000.jpg';
  $paths = '/content/products/prodthumbnail/'.$defImgName;	
}
else
{
$error[] = "file not found";	
}
if(!is_numeric($sId))
{
$error[] =$sId."is not a number";	
}

if(!is_numeric($cID))
{
$error[] =$cID."is not a number";	
}

if(!is_numeric($cStock))
{
$error[] =$cStock."is not a number";	
}

if(!is_numeric($iStock))
{
$error[] =$iStock."is not a number";	
}

if(!is_numeric($pPrice))
{
$error[] =$pPrice."is not a number";	
}
if(!empty($error))
{
echo out_errors($error);	
}
else if(empty($error))
{



$object = new Product();
$del = 0;
$next = $object->insertValues($sId,$pName,$pTag,$cID,$pPrice,$pDesc,$variation,$virtual,$sell,$ppoints,$npoints,$iStock,$cStock,$date,$del);
move_uploaded_file($pic_tmp,$paths);

if($next == 1)
{

header('Location:/viewproduct.php');
}
else
echo"error";
	
}





} */

?>
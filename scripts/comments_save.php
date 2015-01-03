<?php
/*
	Comments saving script
	Author : Aslam
*/

include($_SERVER['DOCUMENT_ROOT']."/internal.php");

$db = new DbCon();

$user = $_SESSION['user'];

if($_POST)
{
	$author = $user->getRegID();
	$comment = $_POST['comment'];
	$prodId = $_POST['prod'];
	$date = date('Y-m-d H:i:s');

	$ar['comment_text'] = "'" .$comment. "'";
	$ar['author_id'] = $author;
	$ar['vote_ups'] = 0;
	$ar['vote_downs'] = 0;
	$ar['post_dnt'] = "'".$date."'";

	$id= $db->runInsertAndGetID('comments', $ar);
	
/*	$arr['comment_id'] = $id;
	$arr['buy_reg_id'] = $author;
	$res = $db->runInsertRecord('buyer_comments', $arr); */


	$prod['comment_id'] = $id;
	$prod['prod_id'] = $prodId;
	$resl = $db->runInsertRecord('product_comments', $prod);

	//  displaying the new comment
	echo "<div class='comment_box'>";
	echo "<div class='body'>";
	echo "<div><span><b>".$user->getDispName()."</b></span> <br/>";
	echo "<span>$date</span> ";

	echo "<div class='txt'>$comment</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}
?>
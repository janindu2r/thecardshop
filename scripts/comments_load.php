<?php
/*
	Comments loading script
	Author : Aslam
*/

//include($_SERVER['DOCUMENT_ROOT']."/class/dbcon.php");

$db = new DbCon();

$sql="SELECT c.* , a.display_name FROM comments c JOIN account a ON c.author_id = a.reg_id JOIN product_comments p ON ";
$sql .= "p.comment_id = c.comment_id WHERE p.prod_id = ". $viewProd->prodId . " ORDER BY c.comment_id DESC ";

$command= $db->getSelectTable($sql);

if ($command) {
	foreach($command as $data)
	{
		$id=$data['display_name'];
		$comment=$data['comment_text'];
		$date = $data['post_dnt'];

		echo "<div class='comment_box'>";
		echo "<div class='body'>";

		echo "<div><span><b>$id</b></span> <br/>";
		echo "<span class='date'>$date</span> ";

		echo "<div class='txt'>$comment</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";

	}	
}


?>
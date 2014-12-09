<?php
include($_SERVER['DOCUMENT_ROOT']."/class/dbcon.php");

$db = new DbCon();

if($_POST)
{
	$author = 10200;	
	$comment = $_POST['comment'];
	$date = date('Y-m-d H:i:s');

	$ar['comment_text'] = "'" .$comment. "'";
	$ar['author_id'] = 10200;
	$ar['vote_ups'] = 0;
	$ar['vote_downs'] = 0;
	$ar['post_dnt'] = "'".$date."'";

	//$cmd = array("comment_text"=>"'$comment'", "author_id"=>"'$author'", "vote_ups"=>"'0'", "vote_downs"=>"'0'", "post_dnt"=>"'$date'");
	$command= $db->runInsertRecord('comments', $ar);

	//  displaying the new comment
	echo "<div class='comment_box'>";
	echo "<div class='body'>";
	echo "<div><span><b>$author</b></span> <br/>";
	echo "<span><b>$date</b></span> ";

	echo "<div class='txt'>$comment</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}
?>
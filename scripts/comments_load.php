<?php
include($_SERVER['DOCUMENT_ROOT']."/class/dbcon.php");

$db = new DbCon();

$sql="Select * from comments order by comment_id asc";

$command= $db->getSelectTable($sql);

foreach($command as $data)
{
$id=$data['author_id'];	
$comment=$data['comment_text'];
$date = $data['post_dnt'];

echo "<div class='comment_box'>";
echo "<div class='body'>";

echo "<div><span><b>$id</b></span> <br/>";
echo "<span><b>$date</b></span> ";

echo "<div class='txt'>$comment</div>";
echo "</div>";
echo "</div>";
echo "</div>";

}	

?>
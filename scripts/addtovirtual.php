<?php
/*
 created by  Bmla
 */
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');

$db = new DbCon();

$arr = null;

$res = 0;
$new = 0;

if (!empty($_POST['addVirtual'])) {
    if ($db->getScalar('select count(prod_id) from virtual where prod_id = ' . $_POST["prod_id"])) {

        $link = $db->getScalar('select download_link from virtual where prod_id = ' . $_POST["prod_id"]);

        if($link !=  $_POST["link"]) {
            $newlink = '"'. $_POST['link']. '"';
            $res = $db->runUpdateOneValue('virtual', 'download_link = ' . $newlink , 'prod_id = ' . $_POST["prod_id"]);
        }

        header('location: /customizeproduct.php?product=' . $_POST["prod_id"] . '&success=' . $res);
    }
    else {
        $arr['prod_id'] = $db->escapeString($_POST["prod_id"]);
        $arr['download_link'] =  '"'. $_POST['link']. '"';

        $new = $db->runInsertRecord("virtual", $arr);

        header('location: /customizeproduct.php?product=' . $_POST["prod_id"] . '&success=' . $new);
    }
}



?>
<?php
/*

*/

$root = $_SERVER['DOCUMENT_ROOT'];
include($root.'/internal.php');

$user = $_SESSION['user'];
$prod = new Product();

//if($_POST) {
    if (isset($_GET['product'])) {
        $prod = $prod->returnProduct($_GET['product']);
        if ($_FILES) {
            if (isset($_FILES['prodImages'])) {
                foreach ($_FILES['prodImages']['name'] as $num => $name) {
                    if ($_FILES['prodImages']['type'][$num] == 'image/jpeg') {
                        move_uploaded_file($_FILES['prodImages']['tmp_name'][$num], $root . $prod->insertImage());
                    }
                }

            }
        }
    //}
        header('Location:/viewproduct.php?product='. $_GET['product']);
    }
else
    header('Location:/index.php');


?>
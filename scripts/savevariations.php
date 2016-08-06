<?php
/* Variation Editing Script
by: JK
*/


$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/internal.php');

if($_SESSION) {
    if ($_POST) {
        $db = new DbCon();

        $longString = '';

        $prodId = $_POST['prodId'];
        $varId = $_POST['varId'];
        $values = $_POST['varValues'];


        $success = 0;
        $allVars = $db->getScalar("select count(variation_value) from variation_values where prod_id = " . $prodId . " and variation_id = " . $varId);
        if ($allVars)
            $success = $db->runNonQuery('delete from variation_values where prod_id = ' . $prodId . ' and variation_id = ' . $varId);

        if(($allVars && $success) || $allVars == 0) {
            $varValues = explode(" | ", $values);
            if ($varValues) {
                foreach ($varValues as $val) {
                    $newVarVal['prod_id'] = $db->escapeString($prodId);
                    $newVarVal['variation_id'] = $db->escapeString($varId);
                    $newVarVal['variation_value'] = $db->escapeString($val);
                    $newVarVal['deleted'] = $db->escapeString('0');
                    if ($val) {
                        $db->runInsertRecord('variation_values', $newVarVal);
                        $longString .= ' | ' . $val;
                    }
                }
            }
        }

        if ($success || $longString)
            echo json_encode(array('success' => '1', 'changed' =>  substr($longString, 3)));
        else
            echo json_encode(array('success' => '0'));

    }

}

?>
<?php
/* Variation Adding Script
by: JK
*/


$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/internal.php');

if($_SESSION) {
    if ($_POST) {
        $db = new DbCon();

        $longString = '';

        $prodId = $_POST['prodId'];
        $name = $_POST['varName'];
        $values = $_POST['varValues'];

        $nKey = $db->getScalar('SELECT IFNULL( MAX( variation_id ) , 0 ) +1 FROM variations WHERE prod_id = ' .  $prodId);
        $newVar['prod_id'] = $db->escapeString( $prodId);
        $newVar['variation_id'] = $db->escapeString($nKey);
        $newVar['var_name'] = $db->escapeString($name);
        $success = $db->runInsertRecord('variations', $newVar);
        if ($success) {
            $varValues = explode(" | ", $values);
            if ($varValues) {
                foreach ($varValues as $val) {
                    $newVarVal['prod_id'] = $db->escapeString($prodId);
                    $newVarVal['variation_id'] = $db->escapeString($nKey);
                    $newVarVal['variation_value'] = $db->escapeString($val);
                    $newVarVal['deleted'] = $db->escapeString('0');
                    $db->runInsertRecord('variation_values', $newVarVal);
                    $longString .= ' | ' . $val;
                }
            }
        }

        if ($success) {
            $newVarid = $nKey;

            $nContent = '<div class="col-sm-6"><div class="col-item" style="padding: 10px; margin-top: 10px;"><div class="form-group"><div class="form-group">';
            $nContent .= '<label for="#">Variation Name</label><input type="text" value="' . $name . '" class="form-control" id="" ';
            $nContent .= ' disabled></div><div class="form-group"><label for="#">Variation Values</label><textarea class="form-control" id="textarea" name="new_var_values[';
            $nContent .= $newVarid . ']" placeholder="Add Variation Values">' . substr($longString, 3)  . '</textarea></div><div class="form-group"><a id="';
            $nContent .= $newVarid . '" class="save-variation btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</a></div></div></div></div>';

            echo json_encode(array('success' => '1', 'nContent' => $nContent));
        } else
            echo json_encode(array('success' => '0'));

    }
}

?>
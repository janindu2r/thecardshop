<?php
/**
 * Validation Check
 * by : Bmla
 */

$root = $_SERVER['DOCUMENT_ROOT'];
include ($root.'/internal.php');

Validate :: validString("bimla");

echo '<hr>';

Validate :: validInt('156745');

echo '<hr>';

Validate :: emailValidate("bimlamadhavee@gmail.com");
echo '<hr>';

Validate :: validNumber('154534');

?>
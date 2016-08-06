<?php
//Including all the class files
$path = $_SERVER['DOCUMENT_ROOT'];
// $path = "/comercio";

foreach (glob($path."/class/*.php") as $filename)
{
	$class = basename($filename, '.php');
		spl_autoload_register(function ($class) {
    		include $_SERVER['DOCUMENT_ROOT']. '/class/' . $class . '.php';
		});
}

session_start();

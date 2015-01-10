<?php
//Including all the class files 
$path = $_SERVER['DOCUMENT_ROOT'];

foreach (glob($path."/class/*.php") as $filename)
{
	$class = basename($filename, '.php');
	if($class != 'aaa') {
		spl_autoload_register(function ($class) {
    		include $_SERVER['DOCUMENT_ROOT']. '/class/' . $class . '.php';
		});
	}
}

session_start();

<?php

function display($page)
{
	$page = strtolower($page);
	$dir = "page-parts/";
	
	include_once($dir.$page.".php");
}

?>
<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$path = "pages/$page.php";
		if(file_exists($path)){
			include "pages/$page.php";
		} else {
			include "pages/404.php";
		}
	} else {
		include "elems/form_AddMoney.php";
	}
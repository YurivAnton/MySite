<?php
	if(!isset($_GET['page'])){
		echo $title = 'index';
	}
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$path = "pages/$page.php";
		if(file_exists($path)){
			echo $title = $_GET['page'];
		} else {
			echo $title = '404';
		}
	}
<?php
	include 'elems/formAddNewKat.php';
	if(!empty($_POST['name']) AND !empty($_POST['value']) AND !empty($_POST['money'])){
		$value = $_POST['value'];
		$name = $_POST['name'];
		$money = $_POST['money'];
		$query = "INSERT INTO kategories 
				SET money='$money', value='$value', name='$name'";
		mysqli_query($link, $query) or die(mysqli_error($link));
	}
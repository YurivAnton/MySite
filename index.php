<?php
	include 'elems/init.php';
	$date = date('Y-m-d'); 
	
	
	
	include 'elems/layout.php';
	
	if(isset($_POST['newMoney'])){
		$whitch_money = $_POST['whitch_money'];
		$sum = $_POST['sum'];
		$kat = $_POST['kat'];
		$date = $_POST['date'];
		$query = "INSERT INTO money 
				SET whitch_money='$whitch_money', sum='$sum', kat='$kat', date='$date'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: / ');
	}
	if(isset($_POST['editMoney'])){
		//$whitch_money = $_POST['whitch_money'];
		$sum = $_POST['sum'];
		//$kat = $_POST['kat'];
		$date = $_POST['date'];
		$id = $_POST['id'];
		$query = "UPDATE money SET sum='$sum', date='$date' WHERE id='$id'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=day ');
	}
	if(isset($_POST['newPlan'])){
		$whitch_money = $_POST['whitch_money'];
		$sum = $_POST['sum'];
		$kat = $_POST['kat'];
		$date = $_POST['date'];
		//$id = $_POST['id'];
		$query = "INSERT INTO money 
				SET whitch_money='$whitch_money', sum='$sum', kat='$kat', date='$date'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=badget ');
	}
	if(isset($_POST['editPlan'])){
		$whitch_money = $_POST['whitch_money'];
		$sum = $_POST['sum'];
		$kat = $_POST['kat'];
		$date = $_POST['date'];
		$id = $_POST['id'];
		$query = "UPDATE money SET sum='$sum' WHERE kat='$kat'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=badget ');
	}
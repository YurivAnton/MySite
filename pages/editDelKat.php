<?php
	if($_SESSION['len'] == 'ua'){
		$textRadio1 = 'Витрати';
		$textRadio2 = 'Прибуток';
		$tablehead1 = 'Назва';
		$tablehead2 = 'Видалити';
		$value = 'Відправити';
	}
	if($_SESSION['len'] == 'sk'){
		$textRadio1 = 'Hotovosť';
		$textRadio2 = 'Karta';
		$tablehead1 = 'Názov';
		$tablehead2 = 'Odstraniť';
		$value = 'Odoslať';
	}
?>
<table border="1">
<tr>
	<th>id</th>
	<th><?php echo $tablehead1 ?></th>
	<th><?php echo $tablehead2 ?></th>
</tr>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "DELETE FROM kategories WHERE id='$id'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=editDelKat ');
	}
	if(!empty($_POST['name']) AND !empty($_POST['value']) AND !empty($_POST['money'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$value = $_POST['value'];
		$money = $_POST['money'];
		$query = "UPDATE kategories SET name='$name', value='$value', money='$money'
				WHERE id='$id'";
		mysqli_query($link, $query) or die(mysqli_error($link));
	}
	
	foreach($_SESSION['kategories'] as $elemKat){
		echo '<tr>
				<td>'.$elemKat['id'].'</td>
				<td>
					<form action="" method="POST">
						<input type="text" name="name" placeholder="'.$elemKat['name'].'">
						<input type="text" name="value" placeholder="'.$elemKat['value'].'">
						<input type="radio" name="money" value="costs"';if($elemKat['money']=='costs'){echo 'checked';}echo'>'.$textRadio1.'
						<input type="radio" name="money" value="profit"';if($elemKat['money']=='profit'){echo 'checked';}echo'>'.$textRadio2.'
						<input type="hidden" name="id" value="'.$elemKat['id'].'">
						<input type="submit" value="'.$value.'">
					</form>
					
				</td>
				
				<td><a href="?page=editDelKat&id='.$elemKat['id'].'"><img src="images/delete.png"></a></td>
			 </tr>';
	}
	
?>
</table>

<?php
	if($_SESSION['len'] == 'ua'){
		$textRadio1 = 'Готівка';
		$textRadio2 = 'Карта';
		$val = 'Відправити';
	}
	if($_SESSION['len'] == 'sk'){
		$textRadio1 = 'Hotovosť';
		$textRadio2 = 'Karta';
		$val = 'Odoslať';
	}
	if(isset($_GET['edit']) AND $_GET['edit'] == 'newPlan'){
?>
		<form action="" method="POST">
			<div id="radio">
				<label>
					<input type="radio" name="whitch_money" value="plan" checked>plan
				</label>
			</div>
				<input name="kat" value="<?php echo $_GET['kat'];?>" placeholder="<?php echo $_GET['kat'];?>" id="input">
				<input name="sum" id="input">
				<input name="newPlan" type="hidden">
				
				<input name="date" value="<?php echo $_GET['date'];?>" id="input">
			<div id="input">
				<input type="submit" value="<?php echo $val; ?>" id="input">
			</div>
		</form>
<?php
	} elseif(isset($_GET['edit']) AND $_GET['edit'] == 'editPlan') {
?>		
	<form action="" method="POST">
		<div id="radio">
			<label>
				<input type="radio" name="whitch_money" value="<?php echo $_GET['whitch_money']?>" checked><?php echo $textRadio1?>
			</label>
		</div>
				<input name="sum" id="input">
				<input name="date" value="<?php echo $_GET['date']?>" id="input">
				<input name="id" value="<?php echo $_GET['id']?>" type="hidden">
				<input name="editPlan" type="hidden">
		<div id="input">
			<input name="kat" value="<?php echo $_GET['kat'];?>" placeholder="<?php echo $_GET['kat'];?>"id="input">
		</div>
		<div id="input">
			<input type="submit" value="<?php echo $val ?>" id="input">
		</div>
	</form>

<?php	
	} elseif(isset($_GET['edit']) AND $_GET['edit'] == 'editMoney') {
?>		
	<form action="" method="POST">
		<div id="radio">
			<label>
				<input type="radio" name="whitch_money" value="<?php echo $_GET['whitch_money']?>" checked><?php echo $textRadio1?>
			</label>
		</div>
				<input name="sum" id="input">
				<input name="date" value="<?php echo $_GET['date']?>" id="input">
				<input name="id" value="<?php echo $_GET['id']?>" type="hidden">
				<input name="editMoney" type="hidden">
		<div id="input">
			<input name="kat" value="<?php echo $_GET['kat'];?>" placeholder="<?php echo $_GET['kat'];?>"id="input">
		</div>
		<div id="input">
			<input type="submit" value="<?php echo $val ?>" id="input">
		</div>
	</form>

<?php	
	} else {
?>
<form action="" method="POST">
	<div id="radio">
		<label>
			<input name="whitch_money" type="radio" value="cash" checked><?php echo $textRadio1?>
		</label>
	</div>
	<div id="radio">
		<label>
			<input name="whitch_money" type="radio" value="card"><?php echo $textRadio2?>
		</label>
	</div>
			<input name="sum" id="input">
			<input name="date" type="hidden" value="<?php echo $date?>">
			<input name="newMoney" type="hidden">
	<div id="input">
		<label>
			<select name="kat">
				<?php
					$query = "SELECT name, value, money FROM kategories";
					mysqli_query($link, $query) or die(mysqli_error($link));
					$result = mysqli_query($link, $query) or die(mysqli_error($link));
					for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
					
					foreach($data as $elem){
						$name = $elem['name'];
						$value = $elem['value'].'-'.$elem['money'];
						echo '<option value='.$value.'>'.$name.'</option>';
					}
				?>
			</select>
		</label>
	</div>
	<div id="input">
		<input type="submit" value="<?php echo $val; ?>" id="input">
	</div>
</form>
<?php
	}
	
	
	
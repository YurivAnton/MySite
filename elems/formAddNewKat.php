<?php
	if($_SESSION['len'] == 'ua'){
		$textRadio1 = 'Витрати';
		$textRadio2 = 'Дохід';
		$placeholder1 = 'Введіть назву';
		$placeholder2 = 'Введіть назву англ. мовою';
		$value = 'Відправити';
	}
	if($_SESSION['len'] == 'sk'){
		$textRadio1 = 'Náklady';
		$textRadio2 = 'Príjem';
		$placeholder1 = 'Zadajte názov';
		$placeholder2 = 'Zadajte názov ang. jazykom';
		$value = 'Odoslať';
	}
?>
<form action="" method="POST">
	<div id="radio">
		<label>
			<input type="radio" name="money" value="costs" checked><?php echo $textRadio1 ?>
		</label>
	</div>
	<div id="radio">
		<label>
			<input type="radio" name="money" value="profit"><?php echo $textRadio2 ?>
		</label>
	</div>
		<label>
			<input type="text" name="name" placeholder="<?php echo $placeholder1 ?>" id="input">
		</label>	
	<label>
		
		<input type="text" name="value" placeholder="<?php echo $placeholder2 ?>"" id="input">
	</label>
	<div id="input">
		<input type="submit" value="<?php echo $value ?>" id="input">
	</div>
</form>
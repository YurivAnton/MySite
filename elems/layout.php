<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="style.css?v=11111111121121234551231">
		<title>
		<?php include 'elems/title.php';?>
		</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
                <div class="center">
					<?php include 'elems/header.php';?>
				</div>
			</div>
			<div id="aside" class="left">
<?php 
	if($_SESSION['len'] == 'sk'){
		$menu = ['Domov', 'Pridať kategóriu', 'Opraviť/výmazať kategóriu', 'Rozpočet', 'Deň', 'Mesiac'];
		$month = ['Januar', 'Februar', 'Marec', 'April', 'May', 'Jun', 'Jul', 'August', 'September', 'Oktober', 'November', 'December'];
	}
	if($_SESSION['len'] == 'ua') {
		$menu = ['Додому', 'Добавити категорію', 'Редагувати/видалити категорію', 'Бюджет', 'День', 'Місяць'];
		$month = ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'];
	}
?>
				<button class="menubtnfirst">
					<a href="/"><?php echo $menu[0] ?></a>
				</button>
				<button class="menubtn">
					<a href="?page=addNewKat"><?php echo $menu[1] ?></a>
				</button>
				<button class="menubtn">
					<a href="?page=editDelKat"><?php echo $menu[2] ?></a>
				</button>
				<button class="menubtn">
					<a href="?page=badget"><?php echo $menu[3] ?></a>
				</button>
				<button class="menubtn">
					<a href="?page=day"><?php echo $menu[4] ?></a>
				</button>
				<div class="menu">
					<button class="menubtn"><?php echo $menu[5] ?></button>
					<div class="submenu"> 
						<a href="?page=month"><?php echo $month[0] ?></a>
						<a href="?page=month#02"><?php echo $month[1] ?></a>
						<a href="?page=month#03"><?php echo $month[2] ?></a>
						<a href="?page=month#04"><?php echo $month[3] ?></a>
						<a href="?page=month#05"><?php echo $month[4] ?></a>
						<a href="?page=month#06"><?php echo $month[5] ?></a>
						<a href="?page=month#07"><?php echo $month[6] ?></a>
						<a href="?page=month#08"><?php echo $month[7] ?></a>
						<a href="?page=month#09"><?php echo $month[8] ?></a>
						<a href="?page=month#10"><?php echo $month[9] ?></a>
						<a href="?page=month#11"><?php echo $month[10] ?></a>
						<a href="?page=month#12"><?php echo $month[11] ?></a>
					</div>
				</div>
			</div>
			<div id="main">
				<?php include 'elems/content.php';?>
			</div>
			<div class="clearfix"></div>
			<footer>
				footer
			</footer>
		</div>
	</body>
</html> 
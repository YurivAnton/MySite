<?php
	$query = "SELECT * FROM money";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for($_SESSION['money']=[]; $row=mysqli_fetch_assoc($result); $_SESSION['money'][]=$row);
	
	$query = "SELECT * FROM kategories";
	$result1 = mysqli_query($link, $query) or die(mysqli_error($link));
	for($_SESSION['kategories']=[]; $row1=mysqli_fetch_assoc($result1); $_SESSION['kategories'][]=$row1);
    
	$moneyInCash = 0;
	$moneyInCard = 0;
    foreach($_SESSION['money'] as $elemMoney){
		if($elemMoney['whitch_money'] == 'cash'){
			if(preg_replace('#.*-#', '', $elemMoney['kat']) == 'profit'){
				$moneyInCash += $elemMoney['sum'];
			}
			if(preg_replace('#.*-#', '', $elemMoney['kat']) == 'costs'){
				$moneyInCash -= $elemMoney['sum'];
			}
		}
		if($elemMoney['whitch_money'] == 'card'){
			if(preg_replace('#.*-#', '', $elemMoney['kat']) == 'profit'){
				$moneyInCard += $elemMoney['sum'];
			}
			if(preg_replace('#.*-#', '', $elemMoney['kat']) == 'costs'){
				$moneyInCard -= $elemMoney['sum'];
			}
		}
	}
	
	if(isset($_GET['len']) AND $_GET['len'] == 'sk'){
		$_SESSION['len'] = 'sk';
		
	} elseif(isset($_GET['len']) AND $_GET['len'] == 'ua') {
		$_SESSION['len'] = 'ua';
		
	}
	if(!isset($_SESSION['len'])){
		$_SESSION['len'] = 'ua';
	}
	if($_SESSION['len'] == 'ua'){
		echo 'В гаманці: '.$moneyInCash.'<br>';
		echo 'На рахунку: '.$moneyInCard;
	}
	if($_SESSION['len'] == 'sk'){
		echo 'V peňaženke: '.$moneyInCash.'<br>';
		echo 'Na účte: '.$moneyInCard;
	}
	
	$hrefUA = '?len=ua';
	if(isset($_GET['page'])){
			$hrefUA = '?page='.$_GET['page'].'&len=ua';
	}elseif(isset($_GET['edit'])){
		$path = '';
		foreach($_GET as $key=>$elem){
			if($key != 'len'){
				$path .= $key.'='.$elem.'&';
			}
		}
		$hrefUA = '?'.$path.'len=ua';
	}
	
	$hrefSK = '?len=sk';
	if(isset($_GET['page'])){
			$hrefSK = '?page='.$_GET['page'].'&len=sk';
	}elseif(isset($_GET['edit'])){
		$path = '';
		foreach($_GET as $key=>$elem){
			if($key != 'len'){
				$path .= $key.'='.$elem.'&';
			}
		}
		$hrefSK = '?'.$path.'len=sk';
	}
?>
	<br>
	<a href="<?php echo $hrefUA ?>">UA</a>
	<a href="<?php echo $hrefSK ?>">SK</a>
	
<?php
	if(isset($_GET['id']) AND isset($_GET['kat'])){
		$kat = $_GET['kat'];
		$query = "DELETE FROM money WHERE kat='$kat'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=badget ');
	}
	
	function badget($money, $len){
		for($i=1; $i<=12; $i++){
			if($len == 'sk'){
				$month = ['Januar', 'Februar', 'Marec', 'April', 'May', 'Jun', 'Jul', 'August', 'September', 'Oktober', 'November', 'December'];
				$tableHead = ['Príjem', 'Plán', 'Fakt', 'Druh peňazí', 'Hotvosť', 'Karta', 'Celková suma'];
			} elseif($len == 'ua') {
				$month = ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'];
				$tableHead = ['Дохід', 'План', 'Факт', 'Вид грошей', 'Готівка', 'Карта', 'Загальна сума'];
			}
						
			$result = '';
			$result .= '<table border="1" id="table">';
			$result .= '<tr>';
			$result .= '<td colspan="4">'.$month[$i-1].'</td>';
			$result .= '</tr>';
			$result .= '<tr>';
			$result .= '<td></td>';
			$result .= '<td>'.$tableHead[1].'</td>';
			$result .= '<td colspan="2">'.$tableHead[2].'</td>';
			$result .= '</tr>';
			$result .= '<tr>';
			$result .= '<td>'.$tableHead[3].'</td>';
			$result .= '<td></td>';
			$result .= '<td>'.$tableHead[4].'</td>';
			$result .= '<td>'.$tableHead[5].'</td>';
			$result .= '</tr>';
			foreach($_SESSION['kategories'] as $elemKat){
				if($elemKat['money'] == $money){
					$result .= '<tr>';
					$result .= '<td>'.$elemKat['name'].'</td>';
					
					$sumCash = 0;
					$sumCard = 0;
					$sumPlan = 0;
					$sumAllCash = 0;
					$sumAllCard = 0;
					$sumAllPlan = 0;
					
					for($j=1; $j<=31; $j++){
						foreach($_SESSION['money'] as $elemMoney){
							if($elemMoney['date'] == '2020-'.$i.'-'.$j.'' 
								OR $elemMoney['date'] == '2020-0'.$i.'-0'.$j.'' 
								OR $elemMoney['date'] == '2020-'.$i.'-0'.$j.'' 
								OR $elemMoney['date'] == '2020-0'.$i.'-'.$j.''){
								if(preg_replace('#-.*#', '', $elemMoney['kat']) == $elemKat['value']){
									if($elemMoney['whitch_money'] == 'cash'){
										$sumCash += $elemMoney['sum'];
									}
								}
								if(preg_replace('#-.*#', '', $elemMoney['kat']) == $elemKat['value']){
									if($elemMoney['whitch_money'] == 'card'){
										$sumCard += $elemMoney['sum'];
									}
								}
								if(preg_replace('#-.*#', '', $elemMoney['kat']) == $elemKat['value']){
									if($elemMoney['whitch_money'] == 'plan'){
										$sumPlan += $elemMoney['sum'];
									}
								}
								if(preg_replace('#.*-#', '', $elemMoney['kat']) == $elemKat['money'] AND $elemMoney['whitch_money'] == 'cash'){
									$sumAllCash += $elemMoney['sum'];
								}
								if(preg_replace('#.*-#', '', $elemMoney['kat']) == $elemKat['money'] AND $elemMoney['whitch_money'] == 'card'){
									$sumAllCard += $elemMoney['sum'];
								}
								if($elemMoney['whitch_money'] == 'plan'){
									$a = explode('-', $elemMoney['kat']);
									if($a[1] == $elemKat['money']){
										$sumAllPlan += $elemMoney['sum'];
									}
								}
							}
						}
					}
					if($sumPlan != 0 AND isset($elemMoney['id'])){
						$result .= '<td>
										<a href="/?edit=editPlan&kat='.$elemKat['value'].'-'.$elemKat['money'].'-'.$month[$i-1].'&whitch_money=plan&date=2020-0'.$i.'-01&id='.$elemMoney['id'].'">'.$sumPlan.'</a>
										<a href="?page=badget&id='.$elemMoney['id'].'&kat='.$elemKat['value'].'-'.$elemKat['money'].'-'.$month[$i-1].'"><img src="images/delete.png"></a>
									</td>';
					} else {
						$result .= '<td>
										<a href="/?kat='.$elemKat['value'].'-'.$elemKat['money'].'-'.$month[$i-1].'&whitch_money=plan&date=2020-0'.$i.'-01&edit=newPlan">'.$sumPlan.'</a>
									</td>';
					}
					$result .= '<td><a href="?page=day&edit=sumKat&kat='.$elemKat['value'].'&date='.$i.'&whitch_money=cash">'.$sumCash.'</a></td>';
					$result .= '<td><a href="?page=day&edit=sumKat&kat='.$elemKat['value'].'&date='.$i.'&whitch_money=card">'.$sumCard.'</a></td>';
				}
			}
			$result .= '</tr>';
			$result .= '<tr>';
			$result .= '<td>'.$tableHead[5].'</td>';
			$result .= '<td>'.$sumAllPlan.'</td>';
			$result .= '<td>'.$sumAllCash.'</td>';
			$result .= '<td>'.$sumAllCard.'</td>';
			$result .= '</tr>';
			$result .= '</table>';
			
			echo $result;
		}
	}
	
?><div id="badget"><?php
	badget('profit', $_SESSION['len']);
?></div><div id="badget"><?php
	badget('costs', $_SESSION['len']);
?></div>
	
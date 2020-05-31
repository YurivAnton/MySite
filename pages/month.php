<?php
	function month($month){
		echo '<a name="'.$month.'"></a>';
		echo '<div id="badget">';
		$result = '';
		$result .= '<table border="1">';
		$result .= '<tr>';
		if($_SESSION['len'] == 'ua'){
		$result .= '<td>Дата</td>';
	}
	if($_SESSION['len'] == 'sk'){
		$result .= '<td>Data</td>';
	}
		
		foreach($_SESSION['kategories'] as $elemKat){
				$result .= '<td>'.$elemKat['name'].'</td>';
		}
		$result .= '</tr>';
		for($j=1; $j<=31; $j++){
			$result .= '<tr>';
			if($j<10){
				$result .= '<td>2020-'.$month.'-0'.$j.'</td>';
			} else {
				$result .= '<td>2020-'.$month.'-'.$j.'</td>';
			}
			foreach($_SESSION['kategories'] as $elemKat){
				$sum = 0;
				foreach($_SESSION['money'] as $elemMoney){
					if($elemMoney['date'] == '2020-'.$month.'-'.$j.'' OR $elemMoney['date'] == '2020-'.$month.'-0'.$j.''){
						if($elemKat['value'] == preg_replace('#-.*#', '', $elemMoney['kat'])){
							$sum += $elemMoney['sum'];
						}
					}
				}
				$result .= '<td>'.$sum.'</td>';
			}
			$result .= '</tr>';
		}
		$result .= '</table>';
		echo $result;
		echo '</div>';
	}
	for($i=1; $i<=12; $i++){
		if($i<10){
			month('0'.$i);
		} else {
			month($i);
		}
	}
	
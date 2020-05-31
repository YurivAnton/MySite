<?php
	if(isset($_GET['id']) AND isset($_GET['kat'])){
		$id = $_GET['id'];
		$kat = $_GET['kat'];
		$whitch_money = $_GET['whitch_money'];
		$query = "DELETE FROM money WHERE kat='$kat' AND id='$id' AND whitch_money='$whitch_money'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: ?page=day ');
	}
	function dateSort($DMY, $numb){
		echo '<label>	
				<select name="date'.$numb.'" id="sort">';
				if($DMY == 'day'){
					for($i=1; $i<=31; $i++){
						if($i == preg_replace('#^0#', '', date('d'))){
							echo '<option selected>'.$i.'</option>';
						}else{
							echo '<option>'.$i.'</option>';
						}
					}
				}
				if($DMY == 'month'){
					if($_SESSION['len'] == 'sk'){
						$month = ['Januar', 'Februar', 'Marec', 'April', 'May', 'Jun', 'Jul', 'August', 'September', 'Oktober', 'November', 'December'];
					}
					if($_SESSION['len'] == 'ua') {
						$month = ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'];
					}
					for($i=1; $i<=12; $i++){
						
						if($i == preg_replace('#^0#', '', date('m'))){
							echo '<option selected>'.$month[$i-1].'</option>';
						}else{
							echo '<option>'.$month[$i-1].'</option>';
						}
					}
				}
				if($DMY == 'year'){
					for($i=1986; $i<=2186; $i++){
						if($i == date('Y')){
							echo '<option selected>'.$i.'</option>';
						}else{
							echo '<option>'.$i.'</option>';
						}
					}
				}
		echo 	'</select>
			</label>';
	}
?>
<form action="" method="POST">
			<?php 
				dateSort('day' ,1); 
				dateSort('month', 1);		
				dateSort('year', 1);
				dateSort('day' ,2); 
				dateSort('month', 2);		
				dateSort('year', 2);		
			?>	
	<input type="submit">
</form>
<?php
	
	$result = '';
	$result .= '<table border="1">';
	$result .= '<tr>';
	if($_SESSION['len'] == 'ua'){
		$result .= '<td>Дата</td>';
	}
	if($_SESSION['len'] == 'sk'){
		$result .= '<td>Data</td>';
	}
	if(isset($_GET['edit']) AND $_GET['edit'] == 'sumKat'){
		foreach($_SESSION['kategories'] as $elemKat){
			if($elemKat['value'] == $_GET['kat']){
				$result .= '<td>'.$elemKat['name'].'</td>';
				$result .= '<td>Карта/Готівка</td>';
			}
		}
		foreach($_SESSION['money'] as $elemMoney){
			if($_GET['kat'] == preg_replace('#-.*#', '', $elemMoney['kat']) AND $elemMoney['date'] >= '2020-0'.$_GET['date'].'-01' AND $elemMoney['date'] <= '2020-0'.$_GET['date'].'-31' AND $elemMoney['whitch_money'] == $_GET['whitch_money']){
				$result .= '<tr>';
				$result .= '<td>'.$elemMoney['date'].'</td>';
				$result .= 	'<td>
								<a href="/?kat='.$elemMoney['kat'].'&whitch_money='.$elemMoney['whitch_money'].'&date='.$elemMoney['date'].'&id='.$elemMoney['id'].'&edit=editMoney">'.$elemMoney['sum'].'</a>
								<a href="?page=day&id='.$elemMoney['id'].'&kat='.$elemMoney['kat'].'&whitch_money='.$elemMoney['whitch_money'].'"><img src="images/delete.png"></a>
							</td>';
				$result .= '<td>'.$elemMoney['whitch_money'].'</td>';
				$result .= '</tr>';
			}
		}
	}else{
		foreach($_SESSION['kategories'] as $elemKat){
			$result .= '<td>'.$elemKat['name'].'</td>';
		}
		$result .= '</tr>';
		foreach($_SESSION['money'] as $elemMoney){
			$result .= '<tr>';
			$result .= '<td>'.$elemMoney['date'].'</td>';
			foreach($_SESSION['kategories'] as $elemKat){
				if($elemKat['value'] == preg_replace('#-.*#', '', $elemMoney['kat'])){
					$result .= '<td>
									<a href="/?kat='.$elemMoney['kat'].'&whitch_money='.$elemMoney['whitch_money'].'&date='.$elemMoney['date'].'&id='.$elemMoney['id'].'&edit=editMoney">'.$elemMoney['sum'].'</a>
									<a href="?page=day&id='.$elemMoney['id'].'&kat='.$elemKat['value'].'-'.$elemKat['money'].'&whitch_money='.$elemMoney['whitch_money'].'"><img src="images/delete.png"></a>
								</td>';
				} else {
					$result .= '<td></td>';
				}
			}
			$result .= '</tr>';
		}
	}
	$result .= '</table>';
	echo $result;
	
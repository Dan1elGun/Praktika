<?php
include 'connect.php';
// Если переменная fio передана
if(isset($_POST['fio'])){
	// Если это запрос на обновление, то обновляем
	if(isset($_GET['red_id'])){
		$sql_update = "UPDATE state SET state.fio = '{$_POST['fio']}', state.phone = '{$_POST['phone']}', state.id_position = '{$_POST['id_position']}' WHERE state.id_employee = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
		if($result_update){
			$success = " Успешно";
		} else {
			echo "Ошибка".mysqli_error($link);
		}
	}
}

if(isset($_GET['red_id'])) {
		$sql_select = "SELECT state.id_employee, state.fio, state.phone, state.id_position FROM state JOIN positions ON state.id_position = positions.id_position WHERE state.id_employee = {$_GET['red_id']}";
		$result_select = mysqli_query($link, $sql_select);
		$row = mysqli_fetch_array($result_select);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Обновление state</title>
</head>
<body>

	<h1>Обновление<?=$success?></h1>

	<form action="" method="post">
		<table>
			<tr>
				<td>ФИО</td>
				<td><input type="text" name="fio" value="<?= isset($_GET['red_id']) ? $row['fio'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Контактный номер</td>
				<td><input type="number" name="phone" value="<?= isset($_GET['red_id']) ? $row['phone'] : ''; ?>"></td>
			</tr>
			<?php
			$sql_positions = "SELECT positions.id_position, positions.position FROM positions";
			$result_positions = mysqli_query($link, $sql_positions);

			echo "<tr>", "<td>Должность</td>", "<td>", "<select name='id_position'>";

			while ($row2 = mysqli_fetch_array($result_positions)) {
				$selected_attribute = ($row['id_position'] === $row2['id_position']) ? 'selected ' : '';
				echo "<option ".$selected_attribute."value='".$row2['id_position']."'>".$row2['position']."</option>";
			}

			echo "</select>", "</td>", "</tr>";
			?>
			<tr>
				<td colspan="2">
						<input type="submit" value="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_state.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
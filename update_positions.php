<?php
include 'connect.php';
if(isset($_POST['position'])){
	if(isset($_GET['red_id'])){
		$sql_update = "UPDATE positions SET positions.position = '{$_POST['position']}', positions.salary = '{$_POST['salary']}' WHERE positions.id_position = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
		if($result_update){
			echo "Успешно";
		} else {
			echo "Ошибка".mysqli_error($link);

		}

	}
}

if(isset($_GET['red_id'])) {
		$sql_select = "SELECT positions.id_position, positions.position, positions.salary FROM positions WHERE positions.id_position = {$_GET['red_id']}";
		$result_select = mysqli_query($link, $sql_select);
		$row = mysqli_fetch_array($result_select);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Обновление positions</title>
</head>
<body>


	<h1>Обновление<?=$success?></h1>

	<form action="" method="post">
		<table>
			<tr>
				<td>Должность</td>
				<td><input type="text" name="position" value="<?= isset($_GET['red_id']) ? $row['position'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Зарплата</td>
				<td><input type="number" name="salary" value="<?= isset($_GET['red_id']) ? $row['salary'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
						<input type="submit" value="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_positions.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
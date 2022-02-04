<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу state</title>
</head>
<body>
	<h1>Добавление данных в таблицу state</h1>

	<form action="insertInto_state.php" method="post" name="action">
		<table>
			<tr>
				<td>ФИО</td>
				<td><input type="text" name="fio"></td>
			</tr>
			<tr>
				<td>Контактный номер</td>
				<td><input type="number" name="phone"></td>
			</tr>

			<?php
			include('connect.php');
			$sql = "SELECT positions.id_position, positions.position FROM positions";
			$result = mysqli_query($link, $sql);

			echo "<tr>", "<td>Должность</td>", "<td>", "<select name='id_position'>";
			
			while ($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['id_position']."'>".$row['position']."</option>";
			}
			echo "</select>", "</td>", "</tr>";
			?>

			<tr>
				<td>
					<input type="submit" name="Добавить данные">
					<input type="reset" name="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
	</div>
	<form action="index_state.php">
		<input type="submit" value="Вернуться назад">
	</form>
	</div>
</body>
</html>
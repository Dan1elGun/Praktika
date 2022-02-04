<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу positions</title>
</head>
<body>

	<h1>Добавление данных в таблицу position</h1>

	<form action="insertInto_positions.php" method="post" name="action">
		<table>
			<tr>
				<td>Должность</td>
				<td><input type="text" name="position"></td>
			</tr>
			<tr>
				<td>Зарплата</td>
				<td><input type="number" name="salary"></td>
			</tr>

			<tr>
				<td> 
					<input type="submit" value="Добавить данные">
					<input type="reset" value="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_positions.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
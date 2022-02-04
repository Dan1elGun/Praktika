<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу movies</title>
</head>
<body>
	<h1>Добавление данных в таблицу movies</h1>

	<form action="insertInto_movies.php" method="post" name="action">
		<table>
			<tr>
				<td>Название</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Продолжительность</td>
				<td><input type="time" name="duration"></td>
			</tr>
			<tr>
				<td>Жанры</td>
				<td><input type="text" name="genres"></td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="Добавить данные">
					<input type="reset" name="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
	</div>
	<form action="index_movies.php">
		<input type="submit" value="Вернуться назад">
	</form>
	</div>
</body>
</html>
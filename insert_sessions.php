<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу sessionss</title>
</head>
<body>

	<h1>Добавление данных в таблицу sessions</h1>

	<form action="insertInto_sessions.php" method="post" name="action">
		<table>
			<?php
			include('connect.php');

				$sql = "SELECT sessions.id_session, sessions.id_movie, movies.id_movie, movies.title FROM sessions JOIN movies ON sessions.id_movie = movies.id_movie";
				$result = mysqli_query($link, $sql);

				echo "<tr>", "<td>Фильм</td>", "<td>", "<select name='id_movie'>";

				while ($row2 = mysqli_fetch_array($result)) {
					$selected_attribute = ($row['id_movie'] === $row2['id_movie']) ? 'selected ' : '';
					echo "<option ".$selected_attribute."value='".$row2['id_movie']."'>".$row2['id_movie']." ".$row2['title']."</option>";
				}

				echo "</select>", "</td>", "</tr>";
			?>
			<tr>
				<td>Дата</td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr>
				<td>Начало</td>
				<td><input type="time" name="start"></td>
			</tr>
			<tr>
				<td>Конец</td>
				<td><input type="time" name="end"></td>
			</tr>
			<tr>
				<td>Места</td>
				<td><input type="number" name="places"></td>
			</tr>
			<tr>
				<td>Цена</td>
				<td><input type="number" name="ticket_price"></td>
			</tr>

			<tr>
				<td> 
					<input type="submit" value="Добавить данные">
					<input type="reset" value="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_sessions.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
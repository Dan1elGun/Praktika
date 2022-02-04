<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу state</title>
</head>
<body>
	<h1>Добавление данных в таблицу state</h1>

	<form action="insertInto_tickets.php" method="post" name="action">
		<table>
			<?php
			include('connect.php');
			$sql = "SELECT sessions.id_session FROM sessions ORDER BY sessions.id_session";
			$result = mysqli_query($link, $sql);

			echo "<tr>", "<td>Сессия</td>", "<td>", "<select name='id_session'>";
			
			while ($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['id_session']."'>".$row['id_session']."</option>";
			}
			echo "</select>", "</td>", "</tr>";
			?>
			<tr>
				<td>Место</td>
				<td><input type="number" name="place"></td>
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
	<form action="index_tickets.php">
		<input type="submit" value="Вернуться назад">
	</form>
	</div>
</body>
</html>
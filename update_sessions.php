<?php
include 'connect.php';
if(isset($_POST['id_movie'])){
	if(isset($_GET['red_id'])){
		$sql_update = "UPDATE sessions SET sessions.id_movie = '{$_POST['id_movie']}', sessions.date = '{$_POST['date']}', sessions.start = '{$_POST['start']}', sessions.end = '{$_POST['end']}', sessions.places = '{$_POST['places']}', sessions.ticket_price = '{$_POST['ticket_price']}' WHERE sessions.id_session = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
		if($result_update){
			$success = " Успешно";
		} else {
			echo "Ошибка".mysqli_error($link);
		}
	}
}

if(isset($_GET['red_id'])) {
		$sql_select = "SELECT sessions.id_session, sessions.id_movie, sessions.date, sessions.start, sessions.end, sessions.places, sessions.ticket_price, movies.title FROM sessions JOIN movies ON movies.id_movie = sessions.id_movie WHERE sessions.id_session = {$_GET['red_id']}";
		$result_select = mysqli_query($link, $sql_select);
		$row = mysqli_fetch_array($result_select);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Обновление sessions</title>
</head>
<body>

	<h1>Обновление<?=$success?></h1>

	<form action="" method="post">
		<table>
			<?php
			$sql = "SELECT movies.id_movie, movies.title FROM movies";
			$result = mysqli_query($link, $sql);

			echo "<tr>", "<td>Фильм</td>", "<td>", "<select name='id_movie'>";

			while ($row2 = mysqli_fetch_array($result)) {
				$selected_attribute = ($row['id_movie'] === $row2['id_movie']) ? 'selected ' : '';
				echo "<option ".$selected_attribute."value='".$row2['id_movie']."'>".$row2['title']."</option>";
			}

			echo "</select>", "</td>", "</tr>";
			?>
			<tr>
				<td>Дата</td>
				<td><input type="date" name="date" value="<?= isset($_GET['red_id']) ? $row['date'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Начало</td>
				<td><input type="time" name="start" value="<?= isset($_GET['red_id']) ? $row['start'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Конец</td>
				<td><input type="time" name="end" value="<?= isset($_GET['red_id']) ? $row['end'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Места</td>
				<td><input type="number" name="places" value="<?= isset($_GET['red_id']) ? $row['places'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Цена</td>
				<td><input type="number" name="ticket_price" value="<?= isset($_GET['red_id']) ? $row['ticket_price'] : ''; ?>"></td>
			</tr>

			<tr>
				<td colspan="2">
						<input type="submit" value="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_sessions.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
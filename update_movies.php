<?php
include 'connect.php';
if(isset($_POST['title'])){
	if(isset($_GET['red_id'])){
		$sql_update = "UPDATE movies SET movies.title = '{$_POST['title']}', movies.duration = '{$_POST['duration']}', movies.genres = '{$_POST['genres']}' WHERE movies.id_movie = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
		if($result_update){
			$success = " Успешно";
		} else {
			echo "Ошибка".mysqli_error($link);
		}
	}
}

if(isset($_GET['red_id'])) {
		$sql_select = "SELECT movies.id_movie, movies.title, movies.duration, movies.genres FROM movies WHERE movies.id_movie = {$_GET['red_id']}";
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
				<td>Название</td>
				<td><input type="text" name="title" value="<?= isset($_GET['red_id']) ? $row['title'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Продолжительность</td>
				<td><input type="time" name="duration" value="<?= isset($_GET['red_id']) ? $row['duration'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Жанры</td>
				<td><input type="text" name="genres" value="<?= isset($_GET['red_id']) ? $row['genres'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
						<input type="submit" value="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_movies.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
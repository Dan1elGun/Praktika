<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица "Фильмы"</title>
</head>
<body>
	<ul class="sort">
		<li> <a href="index_movies.php?sorting=id-movies-asc">По увеличению</a></li>
		<li><a href="index_movies.php?sorting=id-movies-desc">По убыванию</a></li>
		<li><a href="index_movies.php?sorting=default">По умолчанию</a></li>
	</ul>
	<form method="post">
		<table border="1">
			<tr>
				<td><input type="text" name="poisk" value="<?= $_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="&#128269;"></td>
			</tr>
		</table>
	</form>
	</div>

<?php
include('connect.php');

if(isset($_GET['del_id'])){
	$sql_delete = "DELETE FROM movies WHERE movies.id_movie = {$_GET['del_id']}";
	$result_delete = mysqli_query($link, $sql_delete);

	if($result_delete) {
		header('Location: index_movies.php');
	}
	else
	{
		echo '<p>Произошла ошибка: ', mysqli_error($link), '</p>';
	}
}

$sorting = $_GET['sorting'];
switch ($sorting) {
		case "id-movies-asc":
		$sorting_sql = 'ORDER BY movies.id_movie ASC';
			break;
		
		case "id-movies-desc":
		$sorting_sql = 'ORDER BY movies.id_movie DESC';
			break;
		case "default":
		$sorting_sql = 'ORDER BY movies.id_movie ASC';
			break;
}

$poisk = $_POST['poisk'];

if (empty($poisk))
{

	$sql_positions = "SELECT movies.id_movie, movies.title, movies.duration, movies.genres FROM movies $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Название</th>',
			'<th>Продолжительность</th>',
			'<th>Жанры</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_movie']} </td>",
			"<td> {$row['title']} </td>",
			"<td> {$row['duration']} </td>",
			"<td> {$row['genres']} </td>",
			"<td> <a href='update_movies.php?red_id={$row['id_movie']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_movie']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
} else {
	
	$sql_positions = "SELECT movies.id_movie, movies.title, movies.duration, movies.genres FROM movies WHERE movies.id_movie LIKE '$poisk' OR movies.title LIKE '$poisk' OR movies.duration LIKE '$poisk' OR movies.genres LIKE '$poisk' $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Название</th>',
			'<th>Продолжительность</th>',
			'<th>Жанры</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_movie']} </td>",
			"<td> {$row['title']} </td>",
			"<td> {$row['duration']} </td>",
			"<td> {$row['genres']} </td>",
			"<td> <a href='update_positions.php?red_id={$row['id_movie']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_movie']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
}
?>

	<form action="insert_movies.php">
		<input type="submit" value="Добавить">
	</form>
	<form action="header.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
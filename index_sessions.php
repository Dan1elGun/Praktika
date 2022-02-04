<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица "Сессии"</title>
</head>
<body>
	<ul class="sort">
		<li> <a href="index_sessions.php?sorting=id-sessions-asc">По увеличению</a></li>
		<li><a href="index_sessions.php?sorting=id-sessions-desc">По убыванию</a></li>
		<li><a href="index_sessions.php?sorting=default">По умолчанию</a></li>
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
	$sql_delete = "DELETE FROM sessions WHERE sessions.id_session = {$_GET['del_id']}";
	$result_delete = mysqli_query($link, $sql_delete);

	if($result_delete) {
		header('Location: index_sessions.php');
	}
	else
	{
		echo '<p>Произошла ошибка: ', mysqli_error($link), '</p>';
	}
}

$sorting = $_GET['sorting'];
switch ($sorting) {
		case "id-sessions-asc":
		$sorting_sql = 'ORDER BY sessions.id_session ASC';
			break;
		
		case "id-sessions-desc":
		$sorting_sql = 'ORDER BY sessions.id_session DESC';
			break;
		case "default":
		$sorting_sql = 'ORDER BY sessions.id_session ASC';
			break;
}

$poisk = $_POST['poisk'];

if (empty($poisk))
{

	$sql_positions = "SELECT sessions.id_session, sessions.id_movie, sessions.date, sessions.start, sessions.end, sessions.places, sessions.ticket_price, movies.title FROM sessions JOIN movies ON movies.id_movie = sessions.id_movie $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Название</th>',
			'<th>Дата</th>',
			'<th>Начало</th>',
			'<th>Конец</th>',
			'<th>Места</th>',
			'<th>Цена</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_session']} </td>",
			"<td> {$row['title']} </td>",
			"<td> {$row['date']} </td>",
			"<td> {$row['start']} </td>",
			"<td> {$row['end']} </td>",
			"<td> {$row['places']} </td>",
			"<td> {$row['ticket_price']} </td>",
			"<td> <a href='update_sessions.php?red_id={$row['id_session']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_session']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
} else {
	
	$sql_positions = "SELECT sessions.id_session, sessions.id_movie, sessions.date, sessions.start, sessions.end, sessions.places, sessions.ticket_price, movies.title FROM sessions JOIN movies ON movies.id_movie = sessions.id_movie WHERE sessions.id_session LIKE '$poisk' OR movies.title LIKE '$poisk' OR sessions.date LIKE '$poisk' OR sessions.start LIKE '$poisk' OR sessions.end LIKE '$poisk' OR sessions.places LIKE '$poisk' OR sessions.ticket_price LIKE '$poisk' $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Название</th>',
			'<th>Дата</th>',
			'<th>Начало</th>',
			'<th>Конец</th>',
			'<th>Места</th>',
			'<th>Цена</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_session']} </td>",
			"<td> {$row['title']} </td>",
			"<td> {$row['date']} </td>",
			"<td> {$row['start']} </td>",
			"<td> {$row['end']} </td>",
			"<td> {$row['places']} </td>",
			"<td> {$row['ticket_price']} </td>",
			"<td> <a href='update_sessions.php?red_id={$row['id_session']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_session']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
}
?>

	<form action="insert_sessions.php">
		<input type="submit" value="Добавить">
	</form>
	<form action="header.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица "Билеты"</title>
</head>
<body>
	<ul class="sort">
		<li> <a href="index_tickets.php?sorting=id-tickets-asc">По увеличению</a></li>
		<li><a href="index_tickets.php?sorting=id-tickets-desc">По убыванию</a></li>
		<li><a href="index_tickets.php?sorting=default">По умолчанию</a></li>
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
	$sql_delete = "DELETE FROM tickets WHERE tickets.id_ticket = {$_GET['del_id']}";
	$result_delete = mysqli_query($link, $sql_delete);

	if($result_delete) {
		header('Location: index_tickets.php');
	}
	else
	{
		echo '<p>Произошла ошибка: ', mysqli_error($link), '</p>';
	}
}

$sorting = $_GET['sorting'];
switch ($sorting) {
		case "id-tickets-asc":
		$sorting_sql = 'ORDER BY tickets.id_ticket ASC';
			break;
		
		case "id-tickets-desc":
		$sorting_sql = 'ORDER BY tickets.id_ticket DESC';
			break;
		case "default":
		$sorting_sql = 'ORDER BY tickets.id_ticket ASC';
			break;
}

$poisk = $_POST['poisk'];

if (empty($poisk))
{

	$sql_positions = "SELECT tickets.id_ticket, tickets.id_session, tickets.place FROM tickets $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Сессия</th>',
			'<th>Место</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_ticket']} </td>",
			"<td> {$row['id_session']} </td>",
			"<td> {$row['place']} </td>",
			"<td> <a href='update_tickets.php?red_id={$row['id_ticket']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_ticket']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
} else {

	$sql_positions = "SELECT tickets.id_ticket, tickets.id_session, tickets.place FROM tickets WHERE tickets.id_ticket LIKE '$poisk' OR tickets.id_session LIKE '$poisk' OR tickets.place LIKE '$poisk' $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Сессия</th>',
			'<th>Место</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_ticket']} </td>",
			"<td> {$row['id_session']} </td>",
			"<td> {$row['place']} </td>",
			"<td> <a href='update_tickets.php?red_id={$row['id_ticket']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_ticket']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
}
?>

	<form action="insert_tickets.php">
		<input type="submit" value="Добавить">
	</form>
	<form action="header.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
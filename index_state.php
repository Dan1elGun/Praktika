<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица "Сотрудники"</title>
</head>
<body>
	<ul class="sort">
		<li> <a href="index_state.php?sorting=id-state-asc">По увеличению</a></li>
		<li><a href="index_state.php?sorting=id-state-desc">По убыванию</a></li>
		<li><a href="index_state.php?sorting=default">По умолчанию</a></li>
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
	$sql_delete = "DELETE FROM state WHERE state.id_employee = {$_GET['del_id']}";
	$result_delete = mysqli_query($link, $sql_delete);

	if($result_delete) {
		header('Location: index_state.php');
	}
	else
	{
		echo '<p>Произошла ошибка: ', mysqli_error($link), '</p>';
	}
}

$sorting = $_GET['sorting'];
switch ($sorting) {
		case "id-state-asc":
		$sorting_sql = 'ORDER BY state.id_employee ASC';
			break;
		
		case "id-state-desc":
		$sorting_sql = 'ORDER BY state.id_employee DESC';
			break;
		case "default":
		$sorting_sql = 'ORDER BY state.id_employee ASC';
			break;
}

$poisk = $_POST['poisk'];

if (empty($poisk))
{

	$sql_positions = "SELECT state.id_employee, state.fio, state.phone, state.id_position, positions.position FROM state JOIN positions ON state.id_position = positions.id_position $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>ФИО</th>',
			'<th>Контактный номер</th>',
			'<th>Должность</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_employee']} </td>",
			"<td> {$row['fio']} </td>",
			"<td> {$row['phone']} </td>",
			"<td> {$row['position']} </td>",
			"<td> <a href='update_state.php?red_id={$row['id_employee']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_employee']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
} else {

	$sql_positions = "SELECT state.id_employee, state.fio, state.phone, state.id_position, positions.position FROM state JOIN positions ON state.id_position = positions.id_position WHERE state.id_employee LIKE '$poisk' OR state.fio LIKE '$poisk' OR state.phone LIKE '$poisk' OR positions.position LIKE '$poisk' $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>ФИО</th>',
			'<th>Контактный номер</th>',
			'<th>Должность</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_employee']} </td>",
			"<td> {$row['fio']} </td>",
			"<td> {$row['phone']} </td>",
			"<td> {$row['position']} </td>",
			"<td> <a href='update_state.php?red_id={$row['id_employee']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_employee']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
}
?>

	<form action="insert_state.php">
		<input type="submit" value="Добавить">
	</form>
	<form action="header.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
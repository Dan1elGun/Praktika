<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица "Должности"</title>
</head>
<body>
	<ul class="sort">
		<li> <a href="index_positions.php?sorting=id-positions-asc">По увеличению</a></li>
		<li><a href="index_positions.php?sorting=id-positions-desc">По убыванию</a></li>
		<li><a href="index_positions.php?sorting=default">По умолчанию</a></li>
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
	$sql_delete = "DELETE FROM positions WHERE positions.id_position = {$_GET['del_id']}";
	$result_delete = mysqli_query($link, $sql_delete);

	if($result_delete) {
		header('Location: index_positions.php');
	}
	else
	{
		echo '<p>Произошла ошибка: ', mysqli_error($link), '</p>';
	}
}

$sorting = $_GET['sorting'];
switch ($sorting) {
		case "id-positions-asc":
		$sorting_sql = 'ORDER BY positions.id_position ASC';
			break;
		
		case "id-positions-desc":
		$sorting_sql = 'ORDER BY positions.id_position DESC';
			break;
		case "default":
		$sorting_sql = 'ORDER BY positions.id_position ASC';
			break;
}

$poisk = $_POST['poisk'];

if (empty($poisk))
{

	$sql_positions = "SELECT positions.id_position, positions.position, positions.salary FROM positions $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Должность</th>',
			'<th>Зарплата</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_position']} </td>",
			"<td> {$row['position']} </td>",
			"<td> {$row['salary']} </td>",
			"<td> <a href='update_positions.php?red_id={$row['id_position']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_position']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
} else {

	$sql_positions = "SELECT positions.id_position, positions.position, positions.salary FROM positions WHERE positions.id_position LIKE '$poisk' OR positions.position LIKE '$poisk' OR positions.salary LIKE '$poisk' $sorting_sql";
	$result_positions = mysqli_query($link, $sql_positions);

	echo '<table border="1">',
		'<tr>',
			'<th>ID</th>',
			'<th>Должность</th>',
			'<th>Зарплата</th>',
			'<th>&#9998</th>',
			'<th>&#10006</th>',
		'</tr>';
		while ($row = mysqli_fetch_array($result_positions))
		{
			echo '<tr>',
			"<td> {$row['id_position']} </td>",
			"<td> {$row['position']} </td>",
			"<td> {$row['salary']} </td>",
			"<td> <a href='update_positions.php?red_id={$row['id_position']}'>Обновить</a> </td>",
			"<td> <a href='?del_id={$row['id_position']}'>Удалить</a> </td>",
			'</tr>';
		}
	echo '<table>';
}
?>

	<form action="insert_positions.php">
		<input type="submit" value="Добавить">
	</form>
	<form action="header.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
<?php
include('connect.php');

$fio = htmlentities(trim($_POST['fio']));
$phone = htmlentities(trim($_POST['phone']));
$id_position = htmlentities(trim($_POST['id_position']));
$error = ' ';
if(isset($fio) && isset($phone) && isset($id_position))
{
	$sql = "INSERT INTO state (fio, phone, id_position) VALUES ('$fio', '$phone', '$id_position')";
	$result = mysqli_query($link, $sql);

	if($result){
		$error = "Данные успешно добавлены";
	}
	else {
		$error = "Произошла ошибка";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление данных в таблицу данных state</title>
</head>
<body>

	<h1>Добавление данных в таблицу данных state</h1>

	<p><?php echo $error; ?></p>
	<br>
	<form action="index_state.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
	
</body>
</html>
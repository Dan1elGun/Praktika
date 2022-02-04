<?php
include('connect.php');

$id_session = htmlentities(trim($_POST['id_session']));
$place = htmlentities(trim($_POST['place']));
$error = ' ';
if(isset($id_session) && isset($place))
{
	$sql = "INSERT INTO tickets (id_session, place) VALUES ('$id_session', '$place')";
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
	<title>Добавление данных в таблицу данных tickets</title>
</head>
<body>

	<h1>Добавление данных в таблицу данных tickets</h1>

	<p><?php echo $error; ?></p>
	<br>
	<form action="index_tickets.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
	
</body>
</html>
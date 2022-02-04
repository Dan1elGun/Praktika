<?php
include('connect.php');

$id_movie = htmlentities(trim($_POST['id_movie']));
$date = htmlentities(trim($_POST['date']));
$start = htmlentities(trim($_POST['start']));
$end = htmlentities(trim($_POST['end']));
$places = htmlentities(trim($_POST['places']));
$ticket_price = htmlentities(trim($_POST['ticket_price']));
$error = ' ';
if(isset($id_movie) && isset($date) && isset($start) && isset($end) && isset($places) && isset($ticket_price))
{
	$sql = "INSERT INTO sessions (id_movie, date, start, end, places, ticket_price) VALUES ('$id_movie', '$date', '$start', '$end', '$places', '$ticket_price')";
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
	<title>Добавление данных в таблицу данных sessions</title>
</head>
<body>

	<h1>Добавление данных в таблицу данных sessions</h1>

	<p><?php echo $error; ?></p>
	<br>
	<form action="index_sessions.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
	
</body>
</html>
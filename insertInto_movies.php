<?php
include('connect.php');

$title = htmlentities(trim($_POST['title']));
$duration = htmlentities(trim($_POST['duration']));
$genres = htmlentities(trim($_POST['genres']));
$error = ' ';
if(isset($title) && isset($duration) && isset($genres))
{
	$sql = "INSERT INTO movies (title, duration, genres) VALUES ('$title', '$duration', '$genres')";
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
	<title>Добавление данных в таблицу данных movies</title>
</head>
<body>

	<h1>Добавление данных в таблицу данных movies</h1>

	<p><?php echo $error; ?></p>
	<br>
	<form action="index_movies.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
	
</body>
</html>
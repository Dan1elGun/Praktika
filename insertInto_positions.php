<?php
include('connect.php');

$position = htmlentities(trim($_POST['position']));
$salary = htmlentities(trim($_POST['salary']));
$error = ' ';
if(isset($position) && isset($salary))
{
	$sql = "INSERT INTO positions (position, salary) VALUES ('$position', '$salary')";
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
	<title>Добавление данных в таблицу данных positions</title>
</head>
<body>

	<h1>Добавление данных в таблицу данных positions</h1>

	<p><?php echo $error; ?></p>
	<br>
	<form action="index_positions.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
	
</body>
</html>
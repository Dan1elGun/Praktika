<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cinema';
$link =  mysqli_connect($host, $user, $password, $db);
if(!$link){
	echo "Ошибка:  невозможно установить соединение с БД hotel";
	echo '<br>';
	echo "Код ошибки: errno: ".mysqli_connect_errno();
	echo '<br>';
	echo "Код ошибки error: ".mysqli_connect_error();
	exit;
}
?>

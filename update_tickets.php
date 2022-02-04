<?php
include 'connect.php';
if(isset($_POST['id_session'])){
	if(isset($_GET['red_id'])){
		$sql_update = "UPDATE tickets SET tickets.id_session = '{$_POST['id_session']}', tickets.place = '{$_POST['place']}' WHERE tickets.id_ticket = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
		if($result_update){
			$success = " Успешно";
		} else {
			echo "Ошибка".mysqli_error($link);
		}
	}
}

if(isset($_GET['red_id'])) {
		$sql_select = "SELECT tickets.id_ticket, tickets.id_session, tickets.place, sessions.id_session FROM tickets JOIN sessions ON tickets.id_session = sessions.id_session WHERE tickets.id_ticket = {$_GET['red_id']}";
		$result_select = mysqli_query($link, $sql_select);
		$row = mysqli_fetch_array($result_select);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Обновление state</title>
</head>
<body>

	<h1>Обновление<?=$success?></h1>

	<form action="" method="post">
		<table>
			<?php
			$sql = "SELECT sessions.id_session FROM sessions";
			$result = mysqli_query($link, $sql);

			echo "<tr>", "<td>Сессия</td>", "<td>", "<select name='id_session'>";

			while ($row2 = mysqli_fetch_array($result)) {
				$selected_attribute = ($row['id_session'] === $row2['id_session']) ? 'selected ' : '';
				echo "<option ".$selected_attribute."value='".$row2['id_session']."'>".$row2['id_session']."</option>";
			}

			echo "</select>", "</td>", "</tr>";
			?>
			<tr>
				<td>Место</td>
				<td><input type="number" name="place" value="<?= isset($_GET['red_id']) ? $row['place'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
						<input type="submit" value="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_tickets.php">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
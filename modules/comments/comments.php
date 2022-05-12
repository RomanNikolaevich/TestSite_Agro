<?php
if (!empty($_POST['loginComm']) and !empty($_POST['password'])) {
	$loginComm = $_POST['loginComm'];
	$textComm = $_POST['textComm'];

	$query = "INSERT INTO comments SET name='$loginComm', text='$textComm'";
	mysqli_query($link, $query);
}
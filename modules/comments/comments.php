<?php
if (!empty($_POST['loginComm']) and !empty($_POST['textComm'])) {
	$loginComm = $_POST['loginComm'];
	$textComm = $_POST['textComm'];
	$link = mysqli_connect("localhost", "root", "root", "agrodb");
	$query = "INSERT INTO comments SET name='$loginComm', text='$textComm'";
	mysqli_query($link, $query);
}
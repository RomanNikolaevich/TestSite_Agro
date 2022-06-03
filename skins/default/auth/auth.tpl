<div style="padding: 100px;">
    <?php if(!isset($status) || $status != 'OK!') {echo @$error; ?>
	<form action="" method="post">
		Login: <input type="text" name="login"><br>
        Password: <input type="password" name="pass"><br>
        <input type="submit" name="submit" value="Вход">
	</form>
    <?php } else {?>
        Позравляю, Вы авторизированы
    <?php } ?>
</div>
<div style="padding:100px;">
	<?php if(!isset($_SESSION['regok'])) { ?>
	<form action="" method="post">
		<table>
			<tr>
				<td width="90">Логин *</td>
				<td><input type="text" name="login"
						   value="<?php echo @htmlspecialchars($_POST['login']); ?>"></td>
				<td><?php if (isset($errors['login'])) {echo $errors['login'];} ?></td>
			</tr>
			<tr>
				<td>Пароль *</td>
				<td><input type="password" name="password"
						   value="<?php echo @htmlspecialchars($_POST['password']); ?>"></td>
				<td><?php echo @$errors['password']; ?></td> <!--короткая запись с глушилкой ошибок-->
			</tr>
			<tr>
				<td>E-mail *</td>
				<td><input type="email" name="email"
						   value="<?php echo @htmlspecialchars($_POST['email']); ?>"></td>
				<td><?php if (isset($errors['email'])) {echo $errors['email'];} ?></td>
			</tr>
			<tr>
				<td>Возраст</td>
				<td><input type="text" name="age"></td>
				<td></td>
			</tr>
		</table>
		<p style="font-size:10px;">* - поле обязательное для заполнения</p>
		<input type="submit" name="sending" value="Зарегистрироваться">
	</form>
	<?php } else { unset($_SESSION['regok']); ?>
	<div>Вы успешно зарегистрировались на сайте!</div>
	<?php } ?>
</div>
<div class="container mt-4">
	<div class="row">
		<div class="col">
			<?php if(!isset($_SESSION['regok'])) { ?>
			<h2>Регистрация нового пользователя:</h2>
			<form action="" method="post">
				<input type="text" name="login" class="form-control"
					   placeholder="Введите логин *"
					   value="<?php echo @htmlspecialchars($_POST['login']); ?>">
				<?php if (isset($errors['login'])) {echo $errors['login'];} ?>
				<input type="password" name="password" class="form-control"
					   placeholder="Введите пароль *"
					   value="<?php echo @htmlspecialchars($_POST['password']); ?>">
				<?php echo @$errors['password']; ?> <!--короткая запись с глушилкой ошибок-->
				<input type="email" name="email" class="form-control"
					   placeholder="Введите ваш email *"
					   value="<?php echo @htmlspecialchars($_POST['email']); ?>">
				<?php if (isset($errors['email'])) {echo $errors['email'];} ?>
				<input type="text" name="age" class="form-control"
					   placeholder="Введите ваш возраст">
				<p style="font-size:10px;">* - поле обязательное для заполнения</p>
				<button class="btn btn-suc" name="do_signup" type="submit">Зарегистрировать</button>
			</form>
			<?php } else { unset($_SESSION['regok']); ?>
			<div>Вы успешно зарегистрировались на сайте!</div>
			<?php } ?>
		</div>
	</div>
</div>

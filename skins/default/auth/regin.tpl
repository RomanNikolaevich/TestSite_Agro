<div class="container mt-4">
	<div class="row">
		<div class="col">
			<?php if(!isset($_SESSION['regok'])) { ?>
			<h2>Регистрация нового пользователя:</h2>
			<h4 style="color:red"><?php echo @$errors['loginwrong']; ?></h4>
			<form action="" method="post">
				<p>Введите логин *: </p>
                <input type="text" name="login" class="form-control"
					   placeholder="Обязательное к заполнению"
					   value="<?php echo @htmlspecialchars($_POST['login']); ?>">
				<span style="color:red"><?php if (isset($errors['login'])) {echo $errors['login'];} ?></span>
                <p></p>
                <p>Введите пароль *: </p>
				<input type="password" name="password" class="form-control"
					   placeholder="Обязательное к заполнению"
					   value="<?php echo @htmlspecialchars($_POST['password']); ?>">
				<span style="color:red"><?php echo @$errors['password']; ?> </span>
                <p></p>
                <p>Введите ваш email *: </p>
                <input type="email" name="email" class="form-control"
					   placeholder="Введите ваш email *"
					   value="<?php echo @htmlspecialchars($_POST['email']); ?>">
				<span style="color:red"><?php if (isset($errors['email'])) {echo $errors['email'];} ?> </span>
                <p></p>
                <p>Введите ваш возраст: </p>
                <input type="text" name="age" class="form-control"
					   placeholder="не обязательно">
				<p style="font-size:10px;">* - поле обязательное для заполнения</p>
				<button class="btn btn-suc" name="do_signup" type="submit">Зарегистрировать</button>
			</form>
			<?php } else { unset($_SESSION['regok']); ?>
			<div>Вы успешно зарегистрировались на сайте!</div>
			<?php } ?>
		</div>
	</div>
</div>

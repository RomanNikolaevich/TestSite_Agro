<div class="container mt-4">
	<div class="row">
		<div class="col">
			<!-- Форма авторизации -->
			<h2>Форма входа</h2>
			<form method="post">
				<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"
					   value="<?php echo $_POST['login'] ?? '' ?>" required><br>
				<input type="email" class="form-control" name="email" id="email"
					   value="<?php echo $_POST['email'] ?? '' ?>" placeholder="Введите Email" required><br>
				<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"
					   required><br>
				<button class="btn btn-suc" name="do_login" type="submit">Авторизоваться</button>
			</form>
			<br>
			<h4 style="color:red"><?php if (!empty($errorForm['loginError'])) { echo $errorForm['loginError'];} ?></h4>
			<h4 style="color:red"><?php if (!empty($errorForm['emailError'])) { echo $errorForm['emailError'];} ?></h4>
			<h4 style="color:red"><?php if (!empty($errorForm['enterError'])) { echo $errorForm['enterError'];} ?></h4>
			<p>Если вы еще не зарегистрированы, тогда нажмите <a href="index.php?page=regin">здесь</a>.</p>
			<p>Вернуться на <a href="<?php echo $_SERVER['PHP_SELF']; ?>">главную</a>.</p>
		</div>
	</div>
</div>

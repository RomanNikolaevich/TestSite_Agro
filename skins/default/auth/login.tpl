<?php
/**
 * @var $errorForm array
 */
?>
<div class="container mt-4">
	<div class="row">
		<div class="col">
			<!-- Форма авторизации -->
			<?php if(empty($_SESSION['user'])) {echo @$error; ?>
			<h2>Форма входа</h2>
			<form method="post">
				Логин: <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"
					   value="<?php echo $_POST['login'] ?? '' ?>" required><br>
                Пароль: <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"
					   required><br>
                Запомнить меня <input type="checkbox" class="form-check-input" name="autoauthconfirm"
                                      id="autoauthconfirm" ><br>
				<button class="btn btn-suc" name="do_login" type="submit">Авторизоваться</button>
			</form>
			<br>
			<h4 style="color:red"><?php if (!empty($errorForm['loginError'])) { echo $errorForm['loginError'];} ?></h4>
			<h4 style="color:red"><?php if (!empty($errorForm['enterError'])) { echo $errorForm['enterError'];} ?></h4>
			<p>Если вы еще не зарегистрированы, тогда нажмите здесь:</p>
			<div class="btn btn-suc" style=" text-decoration: none;">
				<a style=" text-decoration: none; color: white;"
				   href="/index.php?module=auth&page=regin">Зарегистрироваться</a>
			</div>
			<?php } else {?>
                <div class="col">Позравляю, Вы авторизированы</div>
			<?php } ?>
            <!-- Конец формы авторизации -->
			<p></p>
			<p>Вернуться на <a href="<?php echo $_SERVER['PHP_SELF']; ?>">главную</a>.</p>
		</div>
	</div>
</div>

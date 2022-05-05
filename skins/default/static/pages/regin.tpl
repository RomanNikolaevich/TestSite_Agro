
	<div class="container mt-4">
		<div class="row">
			<div class="col">
				<!-- Форма регистрации -->
				<h2>Форма регистрации</h2>
				<form action="regin.php" method="post">
					<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
					<input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"><br>
					<input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"
						   required><br>
					<input type="text" class="form-control" name="family" id="family" placeholder="Введите фамилию"
						   required><br>
					<input type="password" class="form-control" name="password" id="password"
						   placeholder="Введите пароль"><br>
					<input type="password" class="form-control" name="password_2" id="password_2"
						   placeholder="Повторите пароль"><br>
					<button class="btn btn-suc" name="do_signup" type="submit">Зарегистрировать</button>
				</form>
				<br>
				<p>Если вы зарегистрированы, тогда нажмите <a href="index.php?page=login">здесь</a>.</p>
				<p>Вернуться на <a href="index.php">главную</a>.</p>
			</div>
		</div>
	</div>

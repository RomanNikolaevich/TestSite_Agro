<div class="container mt-4">
	<div class="row">
		<div class="form-group">
			<h2>ОТЗЫВЫ</h2>
			<h5>Если Вы остались довольны услугами <span>"AGRO.UNITED"</span> или вам что-то не понравилось,
				то можете оставить свой комметарий</h5>
			<?php if(!isset($_SESSION['commentOk'])) { ?>
			<form action="" method="post">
				<input type="text" class="form-control" name="loginComm" id="loginReg"
					   value="<?php echo @htmlspecialchars($_POST['loginComm']); ?>"
					   placeholder="Введите логин *"><br>
				<span style="color:red"><?php echo @$errors['loginComm']?></span><br>
				<textarea class="form-control" name="textComm" placeholder="Оставьте свой комментарий *"></textarea><br>
				<span style="color:red"><?php echo @$errors['textComm']?></span><br>
				<p style="font-size:12px;">* - поле обязательное для заполнения</p>
				<button class="btn btn-suc" name="do_signup" type="submit">Отправить</button>
			</form>
			<?php } else { unset($_SESSION['commentOk']); ?>
			<div>Спасибо за оставленный комментарий!</div>
			<?php } ?>
			<br>
		</div>
	</div>
</div>

<div class="container mt-4">
	<div class="row">
		<div class="col">
			<h4>Отзывы наших клиентов:</h4>
			<p>Тут скоро будет вывод на экран комментов (в разработке)</p>
			<br>
		</div>
	</div>
</div>
<div class="container mt-4">
	<div class="row">
		<div class="col">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
		</div>
	</div>
</div>

<?php
/**
 * @var $errors
 * @var $pageno integer
 * @var $total_pages integer
 * @var $commentCountSumm
 * @var $commentCountNull
 * @var $comments array
 * @var $commentCount integer
 * @var $username
 */

?>
<!--Форма ввода комментариев:-->
<div class="container mt-4">
	<div class="row">
		<div class="form-group">
			<h2>ОТЗЫВЫ</h2>
			<h5>Если Вы остались довольны услугами <span>"AGRO.UNITED"</span> или вам что-то не понравилось,
				то можете оставить свой комметарий</h5>
            <?php
            if (!isset($_SESSION['commentOk'])) { ?>
				<form action="" method="post">
                    <?php
                    if (empty($_SESSION['username'])) { ?> <!--блок коментатора-->
						<input type="text" class="form-control" name="username" id="loginReg"
							   value="<?= @htmlspecialchars($_POST['username']);?>"
							   placeholder="Введите логин *"><br>
                        <?php
                        if (!empty($errors['username'])) { ?>
							<span style="color:red"><?=$errors['username']?></span><br>
                            <?php
                        } ?>
                        <?php
                    } else { ?> <!--заканчивается 1 блок условие "если не зарегистрирован"-->
						<input type="text" class="form-control" name="disabledusername" id="disabledTextInput"
							   value=""
							   placeholder="<?= @htmlspecialchars($_SESSION['username']); ?>" disabled><br>
						<p style="font-size:12px;">Для смены пользователя нажмите:
							<button class="btn btn-suc" name="relogin" type="submit">Перезайти</button>
						</p>
                        <?php
                    } ?> <!--заканчивается 2 блок условие "если зарегистрирован"-->
					<p></p>
					<textarea class="form-control" name="comment"
							  placeholder="Оставьте свой комментарий *"></textarea><br>
                    <?php
                    if (!empty($errors['comment'])): ?>
						<span style="color:red"><?=$errors['comment']?></span><br>
                    <?php
                    endif ?>
					<p style="font-size:12px;">* - поле обязательное для заполнения</p>
					<button class="btn btn-suc" name="do_signup" type="submit">Отправить</button>
				</form>
                <?php
            } else {
                unset($_SESSION['commentOk']); ?>
				<div>Спасибо за оставленный комментарий!</div>
                <?php
            } ?>
			<br>
		</div>
	</div>
</div>
<!--Вывод комментариев из БД на экран:-->
<div class="container mt-4">
	<div class="row">
		<div class="col">
			<h4>Отзывы наших клиентов:</h4>
			<div class="comment-body">
				<p>
                    <?=$commentCount
                        ? 'Всего '.$commentCount.' коментариев:<br>'
                        : 'Комментариев пока еще нет, вы будете первым';?>
				</p>
				<div>
                    <?php
                    foreach ($comments as $comment):?>
						<div> <!--Блок вывода комментариев из БД:-->
							# <?php
                            if ($commentCount > 0) {
                                echo $commentCount--;
                            } ?> |
							post ID: <u><?=$comment['id']?></u> |
							user: <u><?=@htmlspecialchars($comment['name'])?></u> |
							date: <u><?=$comment['date']?></u> | : <br>
							<i><?= nl2br(htmlspecialchars($comment['text']));?></i><br>
						</div>
						<p></p>
                    <?php
                    endforeach; ?>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>
<!--Пагинатор:-->
<div class="container mt-4">
	<div class="row">
		<div class="col">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="?module=comments&page=1">First</a>
				</li>
                <?php
                if ($pageno > 1): ?>
					<li class="page-item">
						<a class="page-link" href="?module=comments&page=
							<?= ($pageno - 1); ?>">Prev</a>
					</li>
                <?php
                endif;
                if ($pageno > 1): ?>
					<li class="page-item">
						<a class="page-link" href="?module=comments&page=<?= ($pageno - 1); ?>">
                            <?= ($pageno - 1); ?></a>
					</li>
                <?php
                endif; ?>
				<li class="page-item">
					<a class="page-link" href="?module=comments&page=<?= $pageno; ?>">
                        <?php
                        echo $pageno; ?></a>
				</li>
                <?php
                if ($pageno < $total_pages): ?>
					<li class="page-item">
						<a class="page-link" href="?module=comments&page=<?= ($pageno + 1); ?>">
                            <?= ($pageno + 1); ?></a>
					</li>
                <?php
                endif;
                if ($pageno < $total_pages): ?>
					<li class="page-item">
						<a class="page-link" href="?module=comments&page=<?= ($pageno + 1); ?>">Next</a>
					</li>
                <?php
                endif; ?>
				<li class="page-item">
					<a class="page-link" href='?module=comments&page=<?= $total_pages?>'>Last</a>
				</li>
			</ul>
		</div>
	</div>
</div>
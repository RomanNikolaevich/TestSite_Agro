<div class="container mt-4">
    <div class="row">
        <div class="form-group">
            <?php if (isset($info)) { ?>
                <h1><?php echo $info; ?></h1> <!--уведомление, о добавлении новой записи-->
            <?php } ?>
            <a href="/index.php?module=news&page=add">ДОБАВИТЬ НОВУЮ НОВОСТЬ</a>
            <br>
        <h3> Все существующие новости: </h3>
        <form action="" method="post">
        <?php while($row = mysqli_fetch_assoc($news)) { ?>
        <div>
            <div>
                <input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                <a href="/index.php?module=news&page=edit&id=<?php echo $row['id']; ?>">ОТРЕДАКТИРОВАТЬ</a>
                <a href="/index.php?module=news&action=delete&id=<?php echo $row['id']; ?> ">УДАЛИТЬ</a>
                <b><?php echo $row['title']; ?></b> <!--вывод заглавия-->
                <span style="color:#5c636a; font-size:10px;"><?= $row['date'] ?></span><!-- и даты, серым-->
            </div>
        </div>
            <hr>
        <?php } ?>
            <input type="submit" name="delete" value="Удалить отмеченные записи">
        </form>
        </div>
    </div>
</div>



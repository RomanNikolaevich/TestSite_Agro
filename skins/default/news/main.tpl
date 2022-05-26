<div class="container mt-4">

            <?php if (isset($info)) { ?>
                <h1><?php echo $info; ?></h1> <!--уведомление, о добавлении новой записи-->
            <?php } ?>

            <br>
        <h3> Все существующие новости: </h3>
        <form action="" method="post">
        <?php while($row = mysqli_fetch_assoc($news)) { ?>
        <div class="card mb-3">
            <img class="card-img-top" src="../../../img/azot-2a.jpg" alt="Card image cap">
            <div class="card-body">
                <?php if(!empty($_SESSION['access'])) { //только для админов видно ?>
                <input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                <a class="btn btn-warning" href="/index.php?module=news&page=edit&id=<?php echo $row['id'];
                ?>">Изменить</a>
                <a class="btn btn-danger" href="/index.php?module=news&action=delete&id=<?php echo $row['id'];
                ?> ">Удалить</a>
                <?php } ?>
                <b><?php echo $row['title']; ?></b> <!--вывод заглавия-->
                <span style="color:#5c636a; font-size:10px;"><?= $row['date'] ?></span><!-- и даты, серым-->
            </div>
            <div class="card-footer">
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
            <hr>

        <?php }
            if(!empty($_SESSION['access'])) { //только для админов видно ?>
            <a class="btn btn-primary" href="/index.php?module=news&page=add">Добавить новость</a>
            <input class="btn btn-danger" type="submit" name="delete" value="Удалить отмеченные записи">
            <?php } ?>
        </form>

</div>

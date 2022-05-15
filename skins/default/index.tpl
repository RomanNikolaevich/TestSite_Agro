<?php
/**
 * @var $pagePath
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Roma Agro test site</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/normalize.css" rel="stylesheet"/>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="block">
  <?php include './skins/'.SKIN.'/static/menu/header.tpl'; ?>
  <?php include $pagePath; ?>

  <div class="conteiner-content">
    <?php include './skins/'.SKIN.'/static/menu/footer.tpl'; ?>
  </div>
</div>
</body>
</html>

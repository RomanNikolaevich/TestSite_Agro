<?php
/** @var $adminVisability bool */
/** @var $adminVisability2 bool */
?>

<nav class="container-nav">
	<div class="item"><a href="index.php">main</a></div>
	<div class="item"><a href="index.php?module=news">news</a></div>
    <div class="item"><a href="index.php?module=goods">goods</a></div>
	<div class="item"><a href="index.php?page=services">services</a></div>
	<div class="item"><a href="index.php?page=partners">partners</a></div>
	<div class="item"><a href="index.php?page=contacts">contacts</a></div>
	<div class="item"><a href="index.php?module=comments&page=main">comments</a></div>
	<div class="item"><a href="index.php?module=game&page=game">games</a></div>
	<?php
	//if($adminVisability) {
		if(empty($_SESSION['user'])) { ?>
			<div class="item"><a href="index.php?module=auth&page=login">login</a></div>
			<?php
		} ?>
		<?php
		if(!empty($_SESSION['user'])) { ?>
			<div class="item"><a href="index.php?module=auth&page=logout">logout</a></div>
			<?php
			if(!empty($_SESSION['user'])) {
				echo 'welcome '.$_SESSION['user']['login'];
			}
		//}
	} ?>
</nav>
<div class="container-logo"><img src="img/logo.png" alt="logo">
	<h2>THE BEST QUALITY PRODUCT</h2>
</div>

<?php
/** @var $adminVisability bool */
/** @var $adminVisability2 bool */
?>

<nav class="container-nav">
	<div class="item"><a href="index.php">main</a></div>
	<div class="item"><a href="index.php?action=aboutus">about us</a></div>
	<div class="item"><a href="index.php?action=services">services</a></div>
	<div class="item"><a href="index.php?action=products">products</a></div>
	<div class="item"><a href="index.php?action=partners">partners</a></div>
	<div class="item"><a href="index.php?action=contacts">contacts</a></div>
	<div class="item"><a href="index.php?module=comments&action=main">comments</a></div>
	<div class="item"><a href="index.php?module=game&action=game">games</a></div>
	<?php
	if($adminVisability) {
		if(empty($_SESSION['access'])) { ?>
			<div class="item"><a href="index.php?module=auth&action=login">login</a></div>
			<?php
		} ?>
		<?php
		if(!empty($_SESSION['access'])) { ?>
			<div class="item"><a href="index.php?module=auth&action=logout">logout</a></div>
			<?php
			if(!empty($_SESSION['login'])) {
				echo 'welcome '.$_SESSION['login'];
			}
		}
	} ?>
</nav>
<div class="container-logo"><img src="img/logo.png" alt="logo">
	<h2>THE BEST QUALITY PRODUCT</h2>
</div>

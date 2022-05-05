<?php
/** @var $adminVisability bool */
/** @var $adminVisability2 bool */
?>

<nav class="container-nav">
	<div class="item"><a href="index.php">main</a></div>
	<div class="item"><a href="index.php?page=aboutus">about us</a></div>
	<div class="item"><a href="index.php?page=services">services</a></div>
	<div class="item"><a href="index.php?page=products">products</a></div>
	<div class="item"><a href="index.php?page=partners">partners</a></div>
	<div class="item"><a href="index.php?page=contacts">contacts</a></div>
	<?php
	if($adminVisability) {
		if(empty($_SESSION['access'])) { ?>
			<div class="item"><a href="index.php?page=login">login</a></div>
			<?php
		} ?>
		<?php
		if(!empty($_SESSION['access'])) { ?>
			<div class="item"><a href="index.php?page=logout">logout</a></div>
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

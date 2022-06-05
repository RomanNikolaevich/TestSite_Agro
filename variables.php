<?php
if(isset($_GET['route'])) {
	$temp = explode('/', $_GET['route']);
	foreach ($temp as $k=>$v) {
		if($k == 0 ) {
			$_GET['module'] = $v;
		} elseif($k == 1) {
			if(!empty($v)) {
				$_GET['page'] = $v;
			}
		} else {
			$_GET['key'.($k-1)] = $v;
		}
	}
	unset($_GET['route']);
}

$allowed = array('static', 'news','goods', 'contacts','partners','services','game', 'gameover', 'login','logout',
	'regin','add', 'edit','activate','comments', "404");

if(!isset($_GET['module'])) {
	$_GET['module'] = 'static';
} elseif(!in_array($_GET['module'],$allowed)) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}

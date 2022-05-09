<?php

function wtf($variable, $stop = false) {
	echo '<pre>'.print_r($variable, 1).'</pre>';
	if($stop) {
		exit();
	}
}

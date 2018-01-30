<?php
require_once('templates/template0.html');

$contents = isset($_GET['contents']) ? $_GET['contents'] : '';

if ($contents == '') {
	print '';

} else {
	require_once('contents/'.$contents.'.html');
}

require_once('templates/template1.html');

?>
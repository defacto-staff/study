<?php
$getvalue = isset($_GET['contents']) ? $_GET['contents'] : '';

$contents = array(
    'introduction' => 'はじめに'
    , 'syntax' => 'syntax'
    , 'variables' => '変数'
    , 'echo_print' => 'echo命令（print命令）' // echo and print Statements
    , 'datatypes' => 'datatypes'
    , 'strings' => 'strings'
    , 'constants' => 'constants'
    , 'operators' => 'operators'
    , 'if_else' => 'if_else'
    , 'switch' => 'switch'
    , 'looping_while' => 'looping_while'
    , 'looping_for' => 'looping_for'
    , 'functions' => 'functions'
    , 'arrays' => 'arrays'
    , 'arrays_sort' => 'arrays_sort'
    , 'superglobals' => 'superglobals'
    , 'mysql' => 'データベースとの連携'
);

$arraykeys = array_keys($contents);
$arrayvalues = array_values($contents);

$key = array_search($getvalue, $arraykeys);
$h1 = '<h1>'.$arrayvalues[$key].'</h1>';
$previous = 'index.php?contents='.$arraykeys[$key-1];
$next = 'index.php?contents='.$arraykeys[$key+1]; // 最後のページでエラー


foreach ($contents as $key => $value) {
	$array[] = '<li><a href="index.php?contents='.$key.'">'.$value.'</a></li>';
}

require_once('templates/template0.html');

if (in_array($getvalue, $arraykeys)) {
	require_once('contents/'.$getvalue.'.html'); // 存在しないとエラー
}

require_once('templates/template1.html');

?>
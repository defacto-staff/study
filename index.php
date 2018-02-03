<?php
$getValue = isset($_GET['contents']) ? $_GET['contents'] : '';

$contents = array(
    'introduction' => 'はじめに'
    , 'syntax' => 'PHPの基本'
    , 'variables' => '変数'
    , 'echo_print' => 'echo/print命令'
    , 'types' => '型（データ型）'
    , 'strings' => '文字列'
    , 'constants' => '定数'
    , 'expressions' => '式'
    , 'operators' => '演算子'
    , 'if_else' => '条件分岐（if...else...elseif）'
    , 'switch' => '条件分岐（switch）'
    , 'looping_while' => '繰り返し（while）'
    , 'looping_for' => '繰り返し（for）'
    , 'functions' => '関数'
    , 'arrays' => '配列'
    , 'superglobals' => 'スーパーグローバル'
    , 'forms' => 'フォームの操作'
    , 'arrays_multi' => '多次元配列'
    , 'date' => '日付と時間'
    , 'includes' => 'ファイルのインクルード'
    , 'cookies' => 'クッキー（cookies）'
    , 'sessions' => 'セッション'
    , 'error' => 'エラー'
    , 'exception' => '例外（exceptions）'
    , 'mysql' => 'データベースとの連携'
);

foreach ($contents as $file => $title) {
	$array[] = '<li><a href="index.php?contents='.$file.'">'.$title.'</a></li>';
}

$arrayKeys = array_keys($contents);
$arrayValues = array_values($contents);

$key = array_search($getValue, $arrayKeys);

if ($key === false) {
    $h1 = '';
    $pager = '';
    require_once('templates/template0.html');
    require_once('templates/template1.html');
    exit;
}
$h1 = '<h1>'.$arrayValues[$key].'</h1>';

$pager = '';
if ( $key > 0 && $key < count($arrayKeys)-1 ) {
    $pager = '
        <li class="previous"><a href="index.php?contents='.$arrayKeys[$key-1].'">&larr; 前のページ</a></li>
        <li class="next"><a href="index.php?contents='.$arrayKeys[$key+1].'">次のページ &rarr;</a></li>
    ';

} elseif ( $key == 0 ) {
    $pager = '
        <li class="next"><a href="index.php?contents='.$arrayKeys[$key+1].'">次のページ &rarr;</a></li>
    ';

} elseif ( $key == count($arrayKeys)-1 ) {
    $pager = '
        <li class="previous"><a href="index.php?contents='.$arrayKeys[$key-1].'">&larr; 前のページ</a></li>
    ';
}

require_once('templates/template0.html');

if (in_array($getValue, $arrayKeys)) {
	require_once('contents/'.$getValue.'.html');
}

require_once('templates/template1.html');

?>
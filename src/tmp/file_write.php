<?php
// 書きこみ内容を配列にセット
$data[] = date('Y/m/d H:i:s');
$data[] = $_SERVER['SCRIPT_NAME'];
$data[] = $_SERVER['HTTP_USER_AGERNT'];
$data[] = $_SERVER['HTTP_REFERER'];

$file = @fopen('access.log', 'ab') or die('ファイルを開けませんでした');
flock($file, LOCK_EX);
fwrite($file, implode("\t", $data) . "\n");
flock($file, LOCK_UN);
fclose($file);
echo 'アクセスログを記録しました' . PHP_EOL;

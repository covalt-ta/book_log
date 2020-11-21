<?php
// 変数$xが1の場合には0, そうでない場合には-1を変数$flagにセットする三項演算子を書け
$x = 1;
$flag = ($x === 1 ? 0 : -1);
echo $flag . PHP_EOL;

// 実行演算子
$result = `ls`;
print $result;

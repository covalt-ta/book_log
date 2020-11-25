<?php
// 練習問題5.2
// mb_substr関数を用い、文字列「サーバーサイド技術」から「サイド」という文字列を抽出する
$str = 'サーバーサイド技術';
echo mb_substr($str, 4, -2) . PHP_EOL;
echo mb_substr($str, 4, 3) . PHP_EOL;

// mb_convert_kana関数を使って「 ｻｰﾊﾞｰｻｲﾄﾞ技術」に含まれる半角カナを全角カタカナに変換する
$str = 'ｻｰﾊﾞｰｻｲﾄﾞ技術';
echo mb_convert_kana($str, 'KVC') . PHP_EOL;

// 変数$dataの文字コードを「Shift-JIS」から「EUP-JP」に変換する
$data = mb_convert_encoding($data, 'EUP-JP', 'SJIS');


// $test_result = 80;

// if ($test_result >= 90) {
//     print '優';
// } elseif ($test_result >= 70) {
//     print '良';
// } elseif ($test_result >= 50) {
//     print '可';
// } else {
//     print '不可';
// }

// // 参照渡しによる繰り返し処理内での配列の変更
// $data = ['taku', 'risa', 'ito', 'ao'];
// foreach ($data as &$value) {
//     echo $value . PHP_EOL;
//     if ($value === 'ao') {
//         $data[] = 'atom';
//     }
// }

// // 掛け算の九九の表作成
// for ($i = 1; $i < 10; $i++) {
//     for ($n = 1; $n < 10; $n++) {
//         echo ($i * $n) . ' ';
//     }
//     echo PHP_EOL;
// }

// // 偶数のみの合計値を求める
// $sum = 0;
// for ($i = 1; $i <= 100; $i++) {
//     if ($i % 2 !== 0) {
//         continue;
//     }
//     $sum += $i;
// }
// echo "1から100までの数値のうち、偶数のみを足した合計値は{$sum}です" . PHP_EOL;

// // 上記をwhile文で記述する
// $sum = 0;
// $i = 1;
// while ($i <= 100) {
//     if ($i % 2 !== 0) {
//         $i++;
//         continue;
//     }
//     $sum += $i;
//     $i++;
// }
// echo "1から100までの数値のうち、偶数のみを足した合計値は{$sum}です" . PHP_EOL;

// // 上記while文をもう少し整理する
// $sum = 0;
// $i = 0;
// while ($i <= 100) {
//     $i++;
//     if ($i % 2 !== 0) {
//         continue;
//     }
//     $sum += $i;
// }
// echo "1から100までの数値のうち、偶数のみを足した合計値は{$sum}です" . PHP_EOL;

// 奇数の合計を求めるfor文
// $sum = 0;
// for ($i; $i <= 100; $i++) {
//     if ($i % 2 === 0) {
//         continue;
//     }
//     $sum += $i;
// }
// echo "1から100までの数値のうち、奇数のみを足した合計値は{$sum}です" . PHP_EOL;

// 1~100までの数値を順に加算していき、1000を超えるのはどこか？
// for文の場合
// $sum = 0;
// for ($i = 0; $i <= 100; $i++) {
//     $sum += $i;
//     if ($sum > 1000) {
//         break;
//     }
// }
// echo "1から100までの数値を順に加算していき、合計値が1000を超える時は{$i}です" . PHP_EOL;

// // while文の場合
// $sum = 0;
// $i = 0;
// while ($sum <= 1000) {
//     $i++;
//     $sum += $i;
// }
// echo "1から100までの数値を順に加算していき、合計値が1000を超える時は{$i}です" . PHP_EOL;

// 1 [
// 2 ]
// 3 foreach
// 4 &$item
// 5 *=

// switch文
// $language = 'PHP';
// switch ($language) {
//     case 'PHP':
//     case 'JSP':
//     case 'ASP':
//         echo 'サーバーサイド技術' . PHP_EOL;
//         break;
//     case 'Java Script':
//     case 'VBScript':
//         echo 'クライアントサイド技術' . PHP_EOL;
//         break;
// }

// 上記をif文を使って実行する場合
// $language = 'PHP';
// if ($language === 'PHP' || $language === 'JSP' || $language === 'ASP') {
//     echo 'サーバーサイド技術' . PHP_EOL;
// } elseif ($language === 'Java Script' || $language === 'VBScript') {
//     echo 'クライアントサイド技術' . PHP_EOL;
// }

// // 文字列関数の使用例
// mb_internal_encoding('UTF-8');
// $str = '株式会社BAGUSを退社';

// echo strlen($str) . PHP_EOL; // 26
// echo mb_strlen($str) . PHP_EOL; // 12 マルチバイト対応
// echo mb_substr($str, 6) . PHP_EOL; // 「GUSを退社」 切り取り開始文字、切り取り文字数(省略可能)を引数に渡す
// echo mb_substr($str, 6, -1) . PHP_EOL; // 「GUSを退」 負の切り取り文字数の場合、取得した文字列の末尾から引数分を削除
// echo mb_substr($str, -4, 3) . PHP_EOL; // 「Sを退」 切り取り開始文字が負の数の場合、末尾を「-1」として数えた箇所から以降を取得

// // str_replace関数
// $str = 'にわにはにわにわとりがいるにわにはね';

// echo str_replace('にわには', '庭には、', $str, $count) . PHP_EOL; //庭には、にわにわとりがいる庭には、ね
// echo $count . PHP_EOL; // 2

// $src = ['にわには', 'にわにわとり', 'いる'];
// $rep = ['庭には、', '二羽にわとり', 'いる。']; // 原則、変更対象の要素と変更内容の要素の数は同じである必要がある
// echo str_replace($src, $rep, $str, $count) . PHP_EOL; //庭には、二羽にわとりがいる。庭には、ね,  配列を渡すことも可能。
// echo $count . PHP_EOL; // 4

// // explode関数
// // 指定の文字を区切りとして、文字列を配列に分割する関数
// // array explode(string $delimiter, string $str [, int $limit])
// // $delimiter 区切り文字
// // $str 分割対象の文字列
// // $limit 分割の最大数（デフォルトは制限なし）
// $data = 'ルフィとゾロとサンジとナミとウソップとチョッパー';
// $delimiter = 'と';
// print_r(explode($delimiter, $data)); // [0] => ルフィ [1] => ゾロ [2] => サンジ [3] => ナミ [4] => ウソップ [5] => チョッパー
// print_r(explode($delimiter, $data, 2)); // [0] => ルフィ [1] => ゾロとサンジとナミとウソップとチョッパー
// print_r(explode($delimiter, $data, -2)); // [0] => ルフィ [1] => ゾロ [2] => サンジ [3] => ナミ 「-2」では配列化して末尾から2つの要素を削除の意味


// // SQLを使ってデータの取得
// // 全データの取得
// SELECT *
// FROM reviews;

// // 書籍名、読書状況、評価のみを取得
// SELECT title, status, score
// FROM reviews;

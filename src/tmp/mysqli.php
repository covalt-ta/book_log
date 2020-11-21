<?php

$link = mysqli_connect('db', 'book_log', 'pass', 'book_log');

// 接続エラー時の処理
if (!$link) {
    echo 'Error: データベースに接続できませんでした' . PHP_EOL;
    echo 'Debugging error:' . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo 'データベースに接続できました' . PHP_EOL;

// SQL文をヒアドキュメントで記述
// VALUESの値で文字列を変数で渡す場合も、クォートが必要（ダブルクォート）
$sql = <<<EOT
INSERT INTO campanies(
    name,
    establishment_date,
    founder
) VALUES (
    'BAGUS',
    '2000-01-01',
    'Kenichi Yaguchi'
);
EOT;

// データの登録
$result = mysqli_query($link, $sql);

if ($result) {
    echo 'データを追加しました' . PHP_EOL;
} else {
    echo 'データの追加に失敗しました' . PHP_EOL;
    echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;
}
// データベースとの接続の切断
mysqli_close($link);
echo 'データベースとの接続を切断しました' . PHP_EOL;

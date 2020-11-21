<?php

// MySQL接続の関数
function dbConnect()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');

    // MySQLに接続失敗時の処理
    if (!$link) {
        echo 'Error: データベースに接続出来ませんでした' . PHP_EOL;
        echo 'Dubagging Error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo 'データベースに接続できました' . PHP_EOL;
    return $link;
}

// 登録処理の関数
function registration()
{
    echo '読書ログを登録してください' . PHP_EOL;
    echo '書籍名:';
    $title = trim(fgets(STDIN));

    echo '著者名:';
    $author = trim(fgets(STDIN));

    echo '読書状況:';
    $status = trim(fgets(STDIN));

    echo '評価(5以下の整数):';
    $score = trim(fgets(STDIN));

    echo '感想:';
    $review = trim(fgets(STDIN));

    echo '登録が完了しました' . PHP_EOL . PHP_EOL;
    return [
        '書籍名:' => $title,
        '著者名:' => $author,
        '読書状況:' => $status,
        '評価:' => $score,
        '感想:' => $review
    ];
}

// 表示処理の関数
function display($books)
{
    if (empty($books)) {
        echo '登録された読書ログがありません' . PHP_EOL . PHP_EOL;
    } else {
        for ($i = 0; $i < count($books); $i++) {
            echo $i . ':' . $books[$i]['書籍名:'] . PHP_EOL;
        }
        echo 'ログを表示したいタイトルの番号:';
        $select_book = trim(fgets(STDIN));

        foreach ($books[$select_book] as $key => $value) {
            echo $key . $value . PHP_EOL;
        }
        echo $books[$select_book]['書籍名:'] . 'の読書ログを表示しました' . PHP_EOL . PHP_EOL;
    }
}

// メニュー選択の関数
function selectMenu($menus)
{
    foreach ($menus as $key => $value) {
        echo $key . '. ' . $value . PHP_EOL;
    }

    echo '番号を選択してください(';
    foreach ($menus as $key => $value) {
        echo $key . ',';
    }
    echo '): ';
    $select = trim(fgets(STDIN));
    return $select;
}

// 変数の初期化
$menus = [
    1 => '読書ログを登録',
    2 => '読書ログを表示',
    9 => 'アプリケーションを終了'
];
$books = [];
$select = 0;

// 以下より実行処理(メニュー選択の繰り返し処理)
$link =  dbConnect();

while (true) {
    $select = selectMenu($menus);

    if ($select === '1') {
        $books[] = registration($books);
    } elseif ($select === '2') {
        display($books);
    } elseif ($select === '9') {
        mysqli_close($link);
        echo 'プログラムを終了します' . PHP_EOL;
        break;
    } else {
        echo '正しい番号を入力してください' . PHP_EOL . PHP_EOL;
    }
}

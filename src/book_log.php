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

function validate($review)
{
    $errors = [];
    // 書籍名が正しく入力されているかチェックする
    if (!strlen($review['title'])) {
        $errors['title'] =  '書籍名を入力してください';
    } elseif (strlen($review['title']) > 255) {
        $errors['title'] = '書籍名は255文字以内で入力してください';
    }

    // 著者名が正しく入力されているかチェック
    if (!strlen($review['author'])) {
        $errors['author'] =  '著者名を入力してください';
    } elseif (strlen($review['author']) > 255) {
        $errors['author'] = '著者名は255文字以内で入力してください';
    }

    // 読書状況が正しく入力されているかチェック
    $check_status = ['未読', '読んでいる', '読了'];
    if (!in_array($review['status'], $check_status, true)) {
        $errors['status'] = '読書状況は「未読」「読んでいる」「読了」のいずれかを入力してください';
    }

    // 評価が1~5の間かチェックする
    if ($review['score'] < 1 || $review['score'] > 5) {
        $errors['score'] = '評価は1〜5の間の数値で入力してください';
    }
    // 感想が正しく入力されている
    if (!strlen($review['comment'])) {
        $errors['comment'] =  '感想を入力してください';
    } elseif (strlen($review['comment']) > 1000) {
        $errors['comment'] = '感想は1000文字以内で入力してください';
    }

    return $errors;
}


// 登録処理の関数
function registration($link)
{
    $review = [];
    echo '読書ログを登録してください' . PHP_EOL;
    echo '書籍名:';
    $review['title'] = trim(fgets(STDIN));

    echo '著者名:';
    $review['author'] = trim(fgets(STDIN));

    echo '読書状況(未読・読んでいる・読了):';
    $review['status'] = trim(fgets(STDIN));

    echo '評価(5以下の整数):';
    $review['score'] = (int) trim(fgets(STDIN));

    echo '感想:';
    $review['comment'] = trim(fgets(STDIN));

    $validated = validate($review);

    if (count($validated) > 0) {
        foreach ($validated as $error) {
            echo 'エラー: ' . $error . PHP_EOL;
        }
        return;
    }

    // SQL文を発行してデータベースにデータを登録する $linkの引数が必要
    $sql = <<<EOD
        INSERT INTO reviews(
            title,
            author,
            status,
            score,
            comment
        ) VALUES (
            "{$review['title']}",
            "{$review['author']}",
            "{$review['status']}",
            "{$review['score']}",
            "{$review['comment']}"
        )
EOD;

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo 'データを登録できました' . PHP_EOL . PHP_EOL;
    } else {
        echo 'データの登録に失敗しました' . PHP_EOL;
        echo 'Debugging Error: ' . mysqli_error($link) . PHP_EOL . PHP_EOL;
    }
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
        registration($link);
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

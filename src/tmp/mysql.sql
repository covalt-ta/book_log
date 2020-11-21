-- サンプル＆チュートリアルコマンド

-- ターミナルからMySQLに接続する(Docker環境)
docker-compose exec app mysql -h <ホスト名> -u <ユーザー名> -D <データベース名> -p

-- 接続を切る
quit
exit

-- 登録されたテーブル一覧を確認するMySQLコマンド
SHOW TABLES;

-- 登録されたテーブルの詳細を確認MySQLコマンド
SHOW COLUMNS FROM <テーブル名>;

-- テーブルに登録されたレコードをすべて確認するMySQLコマンド
SELECT * FROM campanies;

-- DockerコンテナからPHPファイルでデータベースに接続する
docker-compose exec app /bin/bash --appコンテナな接続
% mysql -h db -u book_log -D book_log -p < text_file　--appコンテナからmysqlに接続する

-- テーブル登録①
CREATE TABLE book_log (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  author VARCHAR(255),
  status VARCHAR(255),
  score INTEGER,
  comment VARCHAR(1000),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

-- テーブル登録②
CREATE TABLE campanies (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  establishment_date date,
  founder VARCHAR(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;

-- データ登録①
INSERT INTO campanies(
  name,
  establishment_date,
  founder
) VALUES (
  'mercari inc',
  '2013-02-01',
  'Shintaro Yamada'
);

-- データ登録②
INSERT INTO reviews (
  title,
  author,
  status,
  score,
  comment
) VALUES (
  'PHP',
  'Yoshihiro Yamada',
  'end',
  5,
  'good'
);

<?php
session_start();
include("functions.php");
check_session_id();


$pdo = connect_to_db();

// $sql = 'SELECT * FROM todo_table ORDER BY deadline ASC';
$sql = 'SELECT * FROM todo_table WHERE is_deleted = 0 ORDER BY deadline ASC ';


$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["deadline"]}</td>
      <td>{$record["todo"]}</td>
      <td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <h1>ようこそ、<?=  $_SESSION["username"]?>さん</h1>
  <p>QRを読み取るとExpoに飛びます（React nativeの開発アプリ）Expoアプリ要インストール</p>
  <p>現在はまだカメラロールにアクセスして画像を画面に貼り付ける機能のみです</p>
  <div><img src="qrimg.png" alt=""></div>
  <div>
    <p>QRを読み取ると下記の画面が表示される。ボタンを押すとカメラロールにアクセスする</p>
    <img src="appimg.png" alt=""></div>
    <br>
    <br>
    <a href="todo_logout.php">ログアウトする</a>
    <br>
    <br>



          <a href="./react_native/app/sotusei/web-build/index.html">test</a>

</body>

</html>

<style>
  img{
    width: 30%;
    height: 30%;
  }

  body{
    background-color: #f5deb3;
  }
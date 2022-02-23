<?php

// DB接続情報
// $dsn = ‘mysql;host=mysql153.phy.lolipop.lan;dbname=LAA1351624-3m2sih;charset=utf8mb4’;
// $user = ‘LAA1351624’;
// $password = ‘kdJayFzX’;

// try{
// $dbh = new PDO($dsn, $user, $password);

// print(‘connected to the database!!<br>’);

// }catch (PDOException $e){
// print(‘Error:’.$e->getMessage());
// die();
// }

// $dbh = null;

function connect_to_db()
{
  $dbn = 'mysql:dbname=gsacf_d10_05;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';

  // $dbn = 'mysql:dbname=LAA1351624-3m2sih;charset=utf8mb4;port=3306;host=mysql153.phy.lolipop.lan';
  // $user = 'LAA1351624';
  // $pwd = 'kdJayFzX';

  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}

// ログイン状態のチェック関数
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] != session_id()) {
    header('Location:todo_login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}
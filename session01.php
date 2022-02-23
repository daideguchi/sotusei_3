<?php
// session変数を定義して値を入れよう
session_start();
$_SESSION["keyword"] = "PHP";
echo $_SESSION["keyword"];
exit();

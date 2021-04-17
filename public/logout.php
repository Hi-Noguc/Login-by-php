<?php
ini_set( 'display_errors', "On" );
session_start();
require_once'../classes/UserLogic.php';

if(!$logout=filter_input(INPUT_POST,'logout')){
    exit('不正なリクエストです');
}

//ログインしているかを判定し、セッションが切れていたらログインしてくださいとメッセージを出す
//phpのセッションの有効期限はデフォルトでは24分
$result=UserLogic::checklogin();
if(!$result)
{
  exit('セッションが切れましたので、ログインし直してください');
}
//ログアウトする
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログアウト</title>
</head>
<body>
<h2>ログアウト完了</h2>
<p>ログアウトしました</p>
<a href="login_form.php">ログイン画面へ</a>
</body>
</html>
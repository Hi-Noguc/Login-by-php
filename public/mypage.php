<?php
//営業、担当者用ページ
ini_set( 'display_errors', "On" );
session_start();
require_once'../classes/UserLogic.php';
require_once'../functions.php';

//ログインしているかを判定し、していなかったら新規登録画面へ返す
$result=UserLogic::checklogin();
if(!$result)
{
    $_SESSION['login_err']='ユーザーを登録してログインしてください';
    header('Location:signup_form.php');
}

$login_user=$_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>担当画面</title>
</head>
<body>
<h2>担当画面</h2>
<p>ログインユーザー:<?php echo h($login_user['name']);?></p>
<p>メールアドレス<?php echo h($login_user['email']);?></p>
<form action="logout.php" method="POST">
<input type="submit" name="logout"value="ログアウト">
</fprm>    
</body>
<p>担当客先</p>
<p>割り振り案件</p>
<p>編集履歴</p>
</html>
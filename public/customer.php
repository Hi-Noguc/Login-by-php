<?php
//得意先用マイページ
ini_set( 'display_errors', "On" );
session_start();
require_once'../classes/UserLogic.php';
require_once'../functions.php';

// ログインしているかを判定し、していなかったら新規登録画面へ返す
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
    <title>マイページ画面</title>
</head>
<body>
<h2>マイページ画面</h2>
<p>ログインユーザー:<?php echo h($login_user['name']);?></p>
<p>メールアドレス<?php echo h($login_user['email']);?></p>
<form action="logout.php" method="POST">
<input type="submit" name="logout"value="ログアウト">
</fprm> 
<p>注文フォーム</p>   
<p>質問フォーム</p>
</body>
</html>
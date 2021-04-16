<?php
ini_set( 'display_errors', "On" );
require_once'../classes/UserLogic.php';

session_start();
// エラーメッセージを配列に入れてく
$err=[];
//バリデーション filter_inputと正規表現


if(!$email=filter_input(INPUT_POST,'email'))
{
    $err['email']='メールアドレスを記入してください';
}

if(!$password=filter_input(INPUT_POST,'password'))
{
    $err['password']='パスワードを記入してください';
}

if(count($err)>0)
{
    //エラーがあったら戻す
    $_SESSION=$err;
    header('Location: login.php');
    return;
}
    //ログイン成功の処理
$result =UserLogic::login($email,$password);
//ログイン失敗の処理
if(!$result)
{
    header('Location: login.php');
    return;
}
echo 'ログイン成功です';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録画面</title>
</head>
<body>
    <h2>ユーザー登録完了画面</h2>
<?php if(count($err)>0):?>
    <?php foreach($err as $e):?>
        <p><?php echo $e ?></p>
    <?php endforeach ?>
<?php else :?>
<p>ユーザー登録が完了しました</p>
<?php endif ?>
<a href="./login.php">戻る</a>
    
</body>
</html>
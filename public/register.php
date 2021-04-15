<?php
ini_set( 'display_errors', "On" );
require_once'../classes/UserLogic.php';
// エラーメッセージを配列に入れてく
$err=[];
//バリデーション filter_inputと正規表現
if(!$username=filter_input(INPUT_POST,'username'))
{
    $err[]='ユーザー名を記入してください';
}
if(!$emil=filter_input(INPUT_POST,'email'))
{
    $err[]='メールアドレスを記入してください';
}

$password=filter_input(INPUT_POST,'password');
if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password))
{
    $err[]='パスワードは英数字8文字以上100文字以下にしてください';
}
$password_conf=filter_input(INPUT_POST,'password_conf');
if($password!==$password_conf)
{
    $err[]='確認用パスワードと異なっています';
}
if(count($err)===0)
{
    //エラー数０でユーザー登録
    $hasCreated=UserLogic::createUser($_POST);

    if(!$hasCreated){
        $err[]='登録に失敗しました';
    }
}
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
<a href="./signup_form.php">戻る</a>
    
</body>
</html>
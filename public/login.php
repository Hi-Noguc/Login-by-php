<?php
ini_set( 'display_errors', "On" );
session_start();
require_once'../classes/UserLogic.php';

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
    header('Location: login_form.php');
    return;
}
    //ログイン成功の処理
$result =UserLogic::login($email,$password);
//ログイン失敗の処理
if(!$result)
{
    header('Location: login_form.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン完了</title>
</head>
<body>
    <h2>ログイン完了</h2>
<?php if(count($err)>0):?>
    <?php foreach($err as $e):?>
        <p><?php echo $e ?></p>
    <?php endforeach ?>
<?php else :?>
<p>ログインが完了しました</p>
<?php endif ?>
<!-- 受け取ったidからカテゴリを判別して該当ページに遷移させる -->
<?php $userData=UserLogic::getUserByEmail($email);?>

<?php if ($userData['category']==='1') $page='./consumer.php';
elseif($userData['category']==='2') $page='./customer.php';
elseif($userData['category']==='3') $page='./mypage.php';
elseif ($userData['category']==='4') $page='./admin.php';?>
<a href="<?php echo $page?>">マイページへ</a>

</body>
</html>
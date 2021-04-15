<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録画面</title>
</head>
<body>
    <h2>ユーザー登録フォーム</h2>
    <form action="register.php" method="POST">
       <p>
           <label for="username">ユーザー名</label>
           <input type="text" name="username">
       </p>
       <p>
           <label for="email">メールアドレス</label>
           <input type="email" name="email">
       </p>
       <p>
           <label for="password">パスワード</label>
           <input type="password" name="password">
       </p>
       <p>
           <label for="password_conf">パスワード確認</label>
           <input type="password_conf" name="password_conf">
       </p>
       <p>
           <input type="submit" value="新規登録">
       </p>
    </form>
    
</body>
</html>
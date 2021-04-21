<?php
require_once'env.php';
//  Class Dbc{


    
    function connect(){
        $host=DB_HOST;//定数の場合は""不要
        $dbname=DB_NAME;
        $user=DB_USER;
        $pass=DB_PASS;
        $dsn ="mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        /* エラーチェック (DBのエラーチェックにはtry~catchを使う)
        try{通常処理}catch(){エラー時の処理}
        */
        // PDO(PHP Data Object)についてはHPにて詳細確認
        try{
        $pdo = new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
        } 
        catch(PDOException $e){
        echo'接続失敗'.$e->getMessage();
        exit();
        }

    }

//     public function getAll(){
//         $dbh=$this->connect();
//         //SQLの準備
//         $sql="SELECT*FROM $this->table_name";
//         //SQLの実行
//         $stmt=$dbh->query($sql);
//         //SQLの結果を受け取る
//         $result=$stmt->fetchall(PDO::FETCH_ASSOC);
//         return $result;
//         $dbh=null;
//     }
//  }
?>
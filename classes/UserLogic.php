<?php
ini_set( 'display_errors', "On" );
//１つ上の階層は..で
require_once'../dbconnect.php';

class UserLogic
{
    /**
     * ユーザーを登録する
     * @param array $userData
     * @return bool(true or false) $result
     */
    public static function createUser($userData)
    {
        $result=false;
        $sql='INSERT INTO users(name,email,password)
                VALUES(?,?,?)';

        //ユーザーデータを配列に入れる
        $arr=[];
        $arr[]=$userData['username'];
        $arr[]=$userData['email'];
        $arr[]=password_hash($userData['password'],
        PASSWORD_DEFAULT);

        try
        {
            $stmt=connect()->prepare($sql);
            $result=$stmt->execute($arr);
            return $result;
        }
        catch(\Exception $e)
        {
            return $result;
        }
    }
}
?>
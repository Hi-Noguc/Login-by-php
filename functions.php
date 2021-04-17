<?php
/**
 * XSS対策：エスケープ処理
 * 引数：エスケープしたいもの、エスケープの内容、文字コード
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

/**
 * CSRF(シーサーフ)対策
 * @param void
 * @return string $csrf_token
 */
function setToken(){
    //トークンを生成
    //フォームからそのトークンを送信
    //送信後の画面でそのトークンを照会
    //トークンを削除

    $csrf_token=bin2hex(random_bytes(32));
    $_SESSION['csrf_token']=$csrf_token;

    return $csrf_token;
}

?>
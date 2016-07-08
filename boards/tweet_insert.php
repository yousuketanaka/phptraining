<?php
    //DBへの接続・データの選択
   $dbn = "mysql:host=localhost; dbname=bulletin_board_system; charset=utf8";
   $user = "yousuke";
   $pass = "117117117da";
   
   $account = $_GET['account'];
   $contents = $_GET['contents'];
   $account = htmlspecialchars($account, ENT_QUOTES, 'UTF-8');
   $contents = htmlspecialchars($contents, ENT_QUOTES, 'UTF-8');
   $date_time = new DateTime();
   
   try{
    header('Content-Type: text/html; charset=UTF-8');//文字化け対策
    $dbh = new PDO( $dbn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO tweet_tbl (account, contents, date_time) VALUES(?, ?, sysdate())";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $account, PDO::PARAM_STR);
    $stmt->bindValue(2, $contents, PDO::PARAM_STR);
    $stmt->execute();
 
    $dbh = null;
    
    $length = mb_strlen($contents, 'UTF-8');
    if ($length == 0){
        echo 'ツイート欄が空白です。';
    }else if ($length > 300){
        echo '文字制限を超えています。';
    }else{
        header('Location:board_top.php');
        echo "ツイートの投稿が完了しました。";
    }
    
   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
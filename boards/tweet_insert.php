<?php
   //DBに接続
   require_once 'db_config.php';
   
   $name = $_GET['name'];
   $comment = $_GET['comment'];
   
   $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
   $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
   $create_at = new DateTime();
   $update_at = getlastmod();
   
   try{
    //文字化け対策
    header('Content-Type: text/html; charset=UTF-8');
    //DBへの接続
    $dbh = new PDO( $dbn, $user, $pass);
    //SQL文の準備
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "INSERT INTO boards(name, comment) VALUES(?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //DBへの接続を閉じる。
    $dbh = null;
    
    header('Location:board_top.php');

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>

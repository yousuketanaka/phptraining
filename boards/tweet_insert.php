<?php
   //DBに接続
   require_once 'db_config.php';
   
   $name = $_GET['name'];
   $comment = $_GET['comment'];
   $created_at = new DateTime();
   $created_at = $created_at->format('Y-m-d H:i:s');
   $updated_at = getlastmod();
//   $update_at = $update_at->format('Y-m-d H:i:s');
   
   $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
   $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
   
   try{
    //文字化け対策
    header('Content-Type: text/html; charset=UTF-8');
    //DBへの接続
    $dbh = new PDO( $dbn, $user, $pass);
    //SQL文の準備
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "INSERT INTO boards(name, comment, created_at, updated_at) VALUES(?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    $stmt->bindValue(3, $created_at, PDO::PARAM_STR);
    $stmt->bindValue(4, $updated_at, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //DBへの接続を閉じる。
    $dbh = null;
    
    header('Location:tweet_select.php');

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>

<?php
   //DBに接続
   require_once 'db_config.php';
   
   try{
    //文字化け対策
    header('Content-Type: text/html; charset=UTF-8');
    $id = (int) $_GET['id'];
    $name = $_GET['name'];
    $comment = $_GET['comment'];
    
    //DBへの接続
    $dbh = new PDO( $dbn, $user, $pass);
    //SQL文の準備
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "SELECT name,comment FROM boards";
    $stmt = $dbh->prepare($sql);
    //?の部分に入れる値の準備
//    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo('<pre>');
      var_dump($results);
    echo('</pre>');
    
    header('Location:board_top.php');
    
    //DBへの接続を閉じる。
    $dbh = null;

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>

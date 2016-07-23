<?php
   header('Location:tweet_select.php');
   //DBに接続
   require_once 'db_config.php';
   
   $name = $_POST['name'];
   $comment = $_POST['comment'];
   
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
    $sql = "INSERT INTO boards(name, comment) VALUES(?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $result = $stmt->fetch(PDO::FETCH_ASSOC);   //1行づつ取得。fetchAllは全データを配列に変換
    //DBへの接続を閉じる。今の時点でデータがDBに格納されている。
    $dbh = null;


   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>

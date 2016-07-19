<?php
   //DBに接続
   require_once 'db_config.php';
   
   try{
    header('Content-Type: text/html; charset=UTF-8');//文字化け対策
    if (empty($_POST['id'])) throw new Exception('Error');
    $id = (int) $_POST['id'];
    $dbh = new PDO( $dbn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "update boards set comment = '' where id = ?;";
//    $stmt = $dbh->query($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,$id, PDO::PARAM_INT);
    $stmt->execute();
 
    $dbh = null;
    
    header('Location:tweet_top.php');
    
//    echo "ID: " .htmlspecialchars( $id, ENT_QUOTES, 'UTF-8' ) . "の削除が完了しました。";
    
   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
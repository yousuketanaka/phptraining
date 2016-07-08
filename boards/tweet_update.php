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
    header('Content-Type: text/html; charset=UTF-8');//文字化け対策
    $dbh = new PDO( $dbn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "update boards set comment where id = ?;";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $comment, PDO::PARAM_STR);
    $stmt->execute();
 
    $dbh = null;
    
   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
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
    
    $sql = "INSERT INTO boards(name, comment) VALUES(?, ?);
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $dbh = null;
    
    $length = mb_strlen($comment, 'UTF-8');
    if ($length == 0){
        echo 'コメント欄が空白です。';
    }else if ($length > 500){
        echo '文字制限を超えています。';
    }else{
        header('Location:board_top.php');
        echo 'コメントの投稿が完了しました。';  
     }

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
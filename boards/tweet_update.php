<?php
   header('Location:tweet_top.php');
   //DBに接続
   require_once 'db_config.php';
   
   var_dump($_POST['name']); 
   var_dump($_POST['comment']); 
   
    $id = $post['id'];
    $name = $post['name'];
    $comment = $post['comment'];
    $updated_at = $post['updated_at'];
    
    $name = htmlspecialchars($name, ENT_QUOTES, 'utf8');
    $comment = htmlspecialchars($comment, ENT_QUOTES, 'utf8');
    $updated_at = htmlspecialchars($updated_at, ENT_QUOTES, 'utf8');
   
   
   try{
    //文字化け対策
    header('Content-Type: text/html; charset=UTF-8');
//    if (empty($_POST['id'])) throw new Exception('Error');
//    $id = (int) $_POST['id'];
    //DBへの接続
    $dbh = new PDO( $dbn, $user, $pass);
    //SQL文の準備
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "UPDATE boards SET name=?, comment=?, updated_at=? where id=?";
//    $stmt = $dbh->query($sql);
    $stmt = $dbh->prepare($sql);
    
//    $data[] = $name;
//    $data[] = $comment;
//    $data[] = $updated_at;
//    $data[] = $id;
//    $stmt->execute($data);    //SQLの実行

    //?の部分に入れる値の準備
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    $stmt->bindValue(3, $updated_at, PDO::PARAM_INT);
    $stmt->bindValue(4, $id, PDO::PARAM_INT);
//    $stmt->bindValue(1, $name, PDO::PARAM_STR);
//    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    //SQL文の実行
//    $stmt->execute();
    //SQL文の結果の取り出し
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
//    $results = htmlspecialchars($results['comment'], ENT_QUOTES, 'UTF-8');
    //DBへの接続を閉じる。
    $dbh = null;
    
    

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
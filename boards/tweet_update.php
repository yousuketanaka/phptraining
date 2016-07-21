<?php
   header('Location:tweet_top.php');
   //DBに接続
   require_once 'db_config.php';
   
    $post_id = $post['id'];
    $post_name = $post['post_name'];
    $post_comment = $post['post_comment'];
    $post_updated_at = $post['post_updated_at'];
    
    $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'utf8');
    $pro_comment = htmlspecialchars($pro_comment, ENT_QUOTES, 'utf8');
//    $updated_at = $post['updated_at'];
   
//   $id = (int) $_POST['id'];
//   $name = $_POST['name'];
//   $comment = $_POST['comment'];
//   $updated_at = $_POST['updated_at'];
   
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
    //?の部分に入れる値の準備
    $stmt->bindValue(1, $post_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $post_comment, PDO::PARAM_STR);
    $stmt->bindValue(3, $post_updated_at, PDO::PARAM_INT);
    $stmt->bindValue(4, $post_id, PDO::PARAM_INT);
//    $stmt->bindValue(1, $name, PDO::PARAM_STR);
//    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
//    $results = htmlspecialchars($results['comment'], ENT_QUOTES, 'UTF-8');
    //DBへの接続を閉じる。
    $dbh = null;
    
//    echo('<pre>');
//        var_dump($post);
//    echo('</pre>');
    

   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
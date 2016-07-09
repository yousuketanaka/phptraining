<?php
//DBに接続
   require_once 'db_config.php';
   
   $name = $_POST['name'];
   $furigana = $_POST['furigana'];
   $prefecture = $_POST['prefecture'];
   $address = $_POST['address'];
   $contact = (int) $_POST['contact'];
   $gender = (int) $_POST['gender'];
   $message = $_POST['message'];
   
   $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
   $furigana = htmlspecialchars($furigana, ENT_QUOTES, 'UTF-8');
   $prefecture = htmlspecialchars($prefecture, ENT_QUOTES, 'UTF-8');
   $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
   $contact = htmlspecialchars($contact, ENT_QUOTES, 'UTF-8');
   $geder = htmlspecialchars($gender, ENT_QUOTES, 'UTF-8');
   $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
   
   try{
    //文字化け対策
    header('Content-Type: text/html; charset=UTF-8');
    //DBへの接続
    $dbh = new PDO( $dbn, $user, $pass);
    //SQL文の準備
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "INSERT INTO inqiries(name, furigana, prefecture, address, contact, gender, message) VALUES(?,?,?,?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $furigana, PDO::PARAM_STR);
    $stmt->bindValue(3, $prefecture, PDO::PARAM_STR);
    $stmt->bindValue(4, $address, PDO::PARAM_STR);
    $stmt->bindValue(5, $contact, PDO::PARAM_STR);
    $stmt->bindValue(6, $gender, PDO::PARAM_INT);
    $stmt->bindValue(7, $message, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //DBへの接続を閉じる。
    $dbh = null;
    
    header('Location:form_select.php');
    
   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
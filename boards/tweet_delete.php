<?php
    //DBへの接続・データの選択
   $dbn = "mysql:host=localhost; dbname=bulletin_board_system; charset=utf8";
   $user = "yousuke";
   $pass = "117117117da";
   
   $account = $_GET['account'];
   $contents = $_GET['contents'];
   $account = htmlspecialchars($account, ENT_QUOTES, 'UTF-8');
   $contents = htmlspecialchars($contents, ENT_QUOTES, 'UTF-8');
   $date_time = new DateTime();
   
   try{
    header('Content-Type: text/html; charset=UTF-8');//文字化け対策
    $dbh = new PDO( $dbn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tweet_tbl";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
 
    $dbh = null;
    
    while (true){  //無限ループを意味する。while (1)書いても同じ意味。
        $result = $stmt->fetch(PDO::FETCH_ASSOC);  //結果セットから1行を取得する
        if ($result == null){
            break;  //無限ループを脱出する。
        }else{
            echo $result['contents']; //切り取ったカラム名を指定して表示。echo $row;では上手くいかない。
            echo "<br>";
        }
    }
    
   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>
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
    
    <body>
        <header>
          <h1>お問い合わせ確認</h1>
          </header>
          <main>
              <div class="container">
                <div class="confirmation">
                    <table>
                      <tr>
                        <td class="item">項目</td>
                        <td class="content">内容</td>
                      </tr>
                      <tr>
                        <td class="item_left">氏名</td>
                        <td><?php echo $name ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">フリガナ</td>
                        <td><?php echo $furigana ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">都道府県</td>
                        <td><?php echo $prefecture ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">住所</td>
                        <td><?php echo $address ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">電話番号</td>
                        <td><?php echo $contact ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">性別</td>
                        <td><?php echo $gender ;?></td>
                      </tr>
                      <tr>
                        <td class="item_left">メッセージ</td>
                        <td><?php echo $message ;?></td>
                      </tr>
                    </table>
                </div> <!-- end of confirmation -->
              </div>
          </main>
          <footer></footer>


   }catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
   }
?>



<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>お問い合わせ</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <header>
        <h1>お問い合わせ確認</h1>
        </header>
        <main>
            <div class="container">
              <div class="confirmation">
                  <table>
                    <tr>
                      <td class="item">項目</td>
                      <td class="content">内容</td>
                    </tr>
                    <tr>
                      <td class="item_left">氏名</td>
                      <td><?php echo $name ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">フリガナ</td>
                      <td><?php echo $furigana ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">都道府県</td>
                      <td><?php echo $prefecture ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">住所</td>
                      <td><?php echo $address ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">電話番号</td>
                      <td><?php echo $contact ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">性別</td>
                      <td><?php echo $gender ;?></td>
                    </tr>
                    <tr>
                      <td class="item_left">メッセージ</td>
                      <td><?php echo $message ;?></td>
                    </tr>
                  </table>
              </div> <!-- end of confirmation -->
            </div>
        </main>
        <footer></footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
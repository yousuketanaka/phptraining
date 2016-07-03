
<?php
  $name = $_POST['name'];
  $furigana =$_POST['furigana'];
  $prefecture =$_POST['prefecture'];
  $address =$_POST['address'];
  $contact =$_POST['contact'];
  $gender =$_POST['gender'];
  $message =$_POST['message'];
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>お問い合わせ出力画面</title>

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
       <h1>お問い合わせ内容確認</h1>
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
                        <td class="item-left">氏名</td>
                        <td><?php print $name; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">フリガナ</td>
                        <td><?php print $furigana; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">都道府県</td>
                        <td><?php print $prefecture; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">住所</td>
                        <td><?php print $address; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">電話番号</td>
                        <td><?php print $contact; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">性別</td>
                        <td><?php print $gender; ?></td>
                    </tr>
                    <tr>
                        <td class="item-left">メッセージ</td>
                        <td><?php print $message; ?></td>
                    </tr>
                </table>
            </div> <!-- end of confirmation-->
        </div>
    </main>
    <footer></footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
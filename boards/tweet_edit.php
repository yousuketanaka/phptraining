<?php
//   header('Location:tweet_update.php');
   //DBに接続
   require_once 'db_config.php';
   
   $id = (int) $_POST['id'];
   $name = $_POST['name'];
   $comment = $_POST['comment'];
   $updated_at = $_POST['updated_at'];
   
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
    $sql = "SELECT id, name, comment, updated_at FROM boards where id=?";
//    $stmt = $dbh->query($sql);
    $stmt = $dbh->prepare($sql);
    //?の部分に入れる値の準備
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
//    $stmt->bindValue(1, $name, PDO::PARAM_STR);
//    $stmt->bindValue(2, $comment, PDO::PARAM_STR);
    //SQL文の実行
    $stmt->execute();
    //SQL文の結果の取り出し
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

//    $results = htmlspecialchars($results['comment'], ENT_QUOTES, 'UTF-8');
    //DBへの接続を閉じる。
    $dbh = null;
    
//    $post_id = $post['id'];
//    $post_name = $post['name'];
//    $post_comment = $post['comment'];
//    $post_updated_at = $post['updated_at'];
    
    

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
    <title>掲示板|トップ画面</title>

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
          <div class="container">
              <h1>掲示板</h1>
          </div>
      </header>
      <main>
        <div class="container">
            <h2 class="threadHere">スレッドの更新</h2>
            <form action="tweet_update.php" method="post">
                <div class="row form-group">
                    <label for="inputName" class="col-sm-2 control-label">投稿者</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?php echo var_dump($post['name']);?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="inputContents" class="col-sm-2 control-label">スレッド名</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="comment" rows=3><?php echo var_dump($post['comment']);?></textarea>
                    </div>
                    <p class="update_tim">更新時:
                        <?php
                           echo $post['updated_at'];
                        ?>
                    </p>

                </div>
                <div class="row form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $post['id'];?>">
                    <input type="hidden" name="updated_at" value="<?php echo $post['updated_at'];?>">
                    <input type="submit" class="btn_2 btn-default form-control btn-send" value="スレッドの修正">
                  </div>
                </div>
            </form>
        </div> <!--end of container-->
      </main>
      <footer></footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
    $post_id = $post['id'];
    $post_name = $_POST['name'];
    $post_comment = $_POST['comment'];

    $post_name = htmlspecialchars($post_name);
    $post_comment = htmlspecialchars($post_comment);
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
            <h2 class="threadHere">スレッドの変更</h2>
            <form action="tweet_update.php" method="get">
                <div class="row form-group">
                    <label for="inputName" class="col-sm-2 control-label">投稿者</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="post_name" value="<?php if ( $post_name == ''){ echo "名前が入力されていません。";}else{ echo $post_name;}?>" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="inputContents" class="col-sm-2 control-label">スレッド名</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="post_comment" rows=3><?php if ( $post_comment == ''){ echo "スレッドが入力されていません。";}else{ echo $post_comment;}?></textarea>
                    </div>
<!--                        <input type="hidden" name="posttime">
                    <input type="hidden" name="updatetime">-->
                </div>
                <div class="row form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" name="id">
                    <input type="submit" class="btn_2 btn-default form-control btn-send" value="変更確認">
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
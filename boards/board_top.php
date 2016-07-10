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
            <p class="threadHere">新しいスレッドを作る時は、こちらでどうぞ。</p>
            <form action="tweet_insert.php" method="get">
                <div class="row form-group">
                    <label for="inputName" class="col-sm-2 control-label">名前</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" placeholder="氏名" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="inputContents" class="col-sm-2 control-label">コメント</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="comment" rows=5 placeholder="コメントはこちらへ"></textarea>
                    </div>
<!--                        <input type="hidden" name="posttime">
                    <input type="hidden" name="updatetime">-->
                </div>
                <div class="row form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default btn-send" value="投稿">
                  </div>
                </div>
            </form>


            <h2>投稿一覧</h2>
            <?php 
              $posts = array_reverse($posts);
            ?>
            <?php if (count($posts)) :?>
                <?php foreach( $posts as $post) : ?>
                    <div class="row form-group">
                        <label for="inputName" class="col-sm-2 control-label">
                            <?php
                              $name = ($posts['name'] ==='') ? '名前なし': $posts['name'];
                              echo $name;
                            ?>
                        </label>
                        <div class="col-sm-10">
                          <?php
                             $length = mb_strlen($posts['comment'], 'UTF-8');
                                if ($length !== ''){
                                    if ($length >500){
                                        echo '文字制限を超えています。';
                                    }else{
                                        echo $posts['comment']; 
                                    }
                                }else{
                                    echo 'コメント欄を入力してください。';
                                }
                          ;?>
                        </div>
                    </div>
                    <p>
                        <?php
                           echo $created_at;
                        ?>
                    </p>
                    <p>
                        <?php
                           echo $updated_at;
                        ?>
                    </p>
                <?php endforeach ;?>
            <?php else : ?>
                   <p>投稿はありません。</p>
            <?php endif; ?>
          </div>
      </main>
      <footer></footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
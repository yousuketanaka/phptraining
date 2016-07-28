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
            <h2 class="threadHere">新規スレッド作成</h2>
            <form action="tweet_insert.php" method="post">
                <div class="row form-group">
                    <label for="inputName" class="col-sm-2 control-label">投稿者</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" placeholder="氏名" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="inputContents" class="col-sm-2 control-label">スレッド名</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="comment" rows=3 placeholder="こちらにスレッドのタイトルを記入してください。"></textarea>
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
                include 'tweet_select.php';
                
                $posts = array_reverse($posts);
            ?>
            <?php if ( count($posts)) :?>
                <?php foreach( $posts as $post) : ?>
                    <div class="row form-group">
                        <div class="col-sm-12 form-control">
                            <div class="name-display">
                                <p>
                                <?php
                                  $name = ($post['name'] ==='') ? '名前なし': $post['name'];
                                  echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                                ?>
                                </p>
                            </div>
                            <div class="thread">
                                <p>
                                <?php
                                   $length = mb_strlen($post['comment'], 'UTF-8');
                                      if ($length !== ''){
                                          if ($length >500){
                                              echo '文字制限を超えています。';
                                          }else{
                                              $comment = htmlspecialchars($post['comment'], ENT_QUOTES, 'UTF-8');
                                              echo mb_strimwidth($comment, 0, 40, "...","UTF-8");
                                          }
                                      }else{
                                          echo 'コメント欄を入力してください。';
                                      }
                                ;?>
                                </p>
                                <p class="create_time">投稿時:
                                <?php
                                   echo $post['created_at'];
                                ?>
                                </p>
                                <p class="update_tim">更新時:
                                    <?php
                                       echo $post['updated_at'];
                                    ?>
                                </p>
                                <form action="tweet_edit.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $post['id'];?>">
                                    <input type="hidden" name="name" value="<?php echo $post['name'];?>">
                                    <input type="hidden" name="comment" value="<?php echo $post['comment'];?>">
                                    <input type="hidden" name="updated_at" value="<?php echo $post['updated_at'];?>">
                                    <input type="submit" class="btn btn-success form-control" value="変更">
                                </form>
                                <form action="tweet_delete.php" method="post">
            <!--                                    <input type="hidden" name="eventId" value="delete">-->
                                    <input type="hidden" name="id" value="<?php echo $post["id"];?>">
                                    <input type="submit" class="btn btn-success form-control" value="削除">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ;?>
            <?php else : ?>
                   <p>投稿はありません。</p>
            <?php endif; ?>
                    </div> <!--end of container-->
                  </main>
                  <footer></footer>
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
              </body>
            </html>

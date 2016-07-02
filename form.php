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
        <h1>掲示板</h1>
        </header>
        <main>
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf8'); ?>" method="post" class="form-horizontal">
                    <div class="row form-group">
                      <label for="inputTime3" class="col-sm-2 control-label">投稿時間</label>
                      <div class="col-sm-10">
                        <?php
                            $date = new DateTime();
                            echo $date->format('Y-m-d H:i:s');
                        ?>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputName" class="col-sm-2 control-label">投稿者</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="投稿者" required>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputName" class="col-sm-2 control-label">コメント</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="comment" rows="5" cols="10" required></textarea>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default btn-send" value="投稿">
                      </div>
                    </div>
                </form>
                
                
                <?php
                    $dbn = "mysql:host=localhost; dbname=bulletin_board_system; charset=utf8";
                    $user = "root";
                    $pass = "117117117da";
                    $name = $_POST[$result['name']];
                    $comment = $_POST[$result['comment']];

                    $name = htmlspecialchars($name, ENT_QUOTES, 'utf8');
                    $comment = nl2br(htmlspecialchars($comment, ENT_QUOTES, 'utf8'));
                    
                    try{
                        header('Content-Type: text/html; charset=UTF-8');//文字化け対策
                        $dbh = new PDO( $dbn, $user, $pass);
                        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "insert into comment(name, comment) values(?, ?)";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue(1, $name, PDO::PARAM_STR);
                        $stmt->bindValue(2, $comment, PDO::PARAM_STR);
                        $stmt->execute();
                        $dbh = null;
                        
                      
                        foreach( $stmt as $board ){
                            $date = new DateTime();
                            echo '<div class="time-space">投稿時間:'.$date->format('Y-m-d H:i:s').'</div>';

                            if (isset($name) && $name !='') {
                                echo '<div class="name-space">投稿者:'.$board['name'].'</div>';
                            }else{
                                echo '<div class="name-space">お名前を入力してください。</div>';
                            }

                            if (isset($comment) && $comment !='') {
                                echo '<textarea class="text-space">'.$board['comment'].'</textarea>';
                            }else{
                                echo '<div class="comment-space">コメントを入力してください。</div>';
                            }
                            echo $board;
                        }
                       
                    }catch(PDOException $e){
                       echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
                       exit;
                    }
                ?>
            </div>
        </main>
        <footer></footer>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
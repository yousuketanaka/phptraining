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
        <h1>お問い合わせ</h1>
        </header>
        <main>
            <div class="container">
                <form action="form_output.php" method="post" class="form-horizontal">
                    <div class="row form-group">
                      <label for="inputName" class="col-sm-2 control-label">名前</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="山田花子" required>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputfurigana" class="col-sm-2 control-label">フリガナ</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="furigana" placeholder="ヤマダ ハナコ" required>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputPrefecture" class="col-sm-2 control-label">都道府県</label>
                      <div class="col-sm-10">
                          <?php 
                            $prefecture = array(
                                "都道府県の選択","青森県","岩手県","宮城県","秋田県","山形県","福島県","東京都","神奈川県","埼玉県","千葉県",
                                "茨城県","栃木県","群馬県","山梨県","新潟県","長野県","富山県","石川県","福井県","愛知県","岐阜県","静岡県",
                                "三重県","大阪府","兵庫県","京都府","滋賀県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県",
                                "徳島県","香川県","高知県","愛媛県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"
                            );

                            $html = "<select name=\"prefecture\" class=\"form-control\">\n";

                            for ($i = 0; $i <= count($prefecture)-1; $i++)
                            {
                              $html .= "<option value=\"$prefecture[$i]\">$prefecture[$i]</option>\n";
                            }

                            $html .= "</select>\n";

                            print $html;

                          ?>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputAddress" class="col-sm-2 control-label">住所</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" placeholder="新宿区西新宿1丁目" required>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputContact" class="col-sm-2 control-label">電話番号</label>
                      <div class="col-sm-10">
                          <input type="number" class="form-control" name="contact" placeholder="090000000" required>
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputGender" class="col-sm-2 control-label">性別</label>
                      <div class="col-sm-10">
                          <input type="radio" name="gender" value="1" checked>男性
                          <input type="radio" name="gender" value="2" checked>女性
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="inputMessage" class="col-sm-2 control-label">メッセージ</label>
                      <div class="col-sm-10">
                          <textarea name="message" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default btn-send" value="送信">
                        <input type="submit" class="btn btn-default btn-send" value="リセット">
                      </div>
                    </div>
                </form>
            </div>
        </main>
        <footer></footer>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!---PHP乱入箇所-->
<?php
      mb_internal_encoding("utf8");
      $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
      $stmt = $pdo -> query("select * from 4each_keiziban");
?> 

    <header>

        <a href = "logo">
            <img src="4eachblog_logo.jpg">
        </a>

     <!--ヘッダーの部分-->
        <ul class="menu">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>お問い合わせ</li>
            <li>その他</li>
        </ul>

    </header>

    <main>
        <h1>プログラミングに役立つ掲示板</h1>

     <div class="left">
     <!--掲示板の入力フォーム-->
        <form method="post" action="insert.php">
           <h4>入力フォーム</h4>

           <div>
            <label>ハンドルネーム</label>
            <br>
             <input type="text" class="handlename" name="handlename">
           </div>

           <div>
            <label>タイトル</label>
            <br>
             <input type="text" class="title" name="title">
           </div>

           <div>
            <label>コメント</label>
            <br>
             <textarea cols="35" rows="7" class="comments" name="comments"></textarea>
           </div>

           <div>
             <input type="submit" class="button" value="送信する">
           </div>
        </form>
         

      <!--記事-->
      <?php
      
      while($row = $stmt -> fetch()){

       echo "<form class='kiji'>";
       echo "<h3>".$row['title']."</h3>";
       echo "<div class='contents'>";
       echo $row['comments']; 
       echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
       echo"</div>";
       echo "</form>";
       }
       
      ?>

     </div>

    <!--掲示板入力フォームの右側-->
     <div class="right">
            <h2>人気の記事</h2>
              <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdmineの使い方</li>
                <li>今人気のエディタ　Top5</ii>
                <li>HTMLの基礎</li>
             </ul>
      
             <h2>オススメリンク</h2>
              <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipsのダウンロード</ii>
                <li>Bracketsのダウンロード</li>
             </ul>
    
             <h2>カテゴリ</h2>
              <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
             </ul>
      </div>
    
    </main>

    <footer>
        copyright © internous | 4each blog the which provides A to Z about programming.
     </footer>

</body>


</html>
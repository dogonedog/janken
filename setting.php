<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>設定</title>
</head>
<body>
  <h1>設定</h1>
  <form action="settingDone.php" method="post"><!--index.phpから変更-->
    あなたの名前:<input type="text" name="userName"><br>
    コム1の名前:<input type="text" name="com1Name"><br>
    コム2の名前:<input type="text" name="com2Name"><br>
    <input type="submit" value="設定終了">
  </form>
</body>
</html>
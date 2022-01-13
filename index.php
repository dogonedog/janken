<?php
$userName = "あなた";
$comName = "わたし";
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>じゃんけんゲーム</title>
  </head>
  <body>
    <h1>じゃんけんゲーム</h1>
    <form action="game.php" method="post">
      <input type="radio" name="hand" id="gu" value="0"/>
      <label for="gu">グー</label><br/>

      <input type="radio" name="hand" id="choki" value="1"/>
      <label for="choki">チョキ</label><br/>

      <input type="radio" name="hand" id="pa" value="2"/>
      <label for="pa">パー</label><br/>

      <input type="hidden" name="userName"
             value="<?php echo $userName;  ?>"/>
      <input type="hidden" name="comName"
             value="<?php echo $comName;  ?>"/>
      <input type="submit" value="OK"/>
    </form>
  </body>
</html>
      


<!-- 修正時刻: Tue Jan 11 11:14:40 2022 -->

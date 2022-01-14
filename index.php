<?php
session_start();

require_once('Player.php');
require_once('ResultStrategy.php');

if (! isset($_SESSION['user'])){
  $user = new Player("あなた");
  $_SESSION['user'] = serialize($user);
}
if (! isset($_SESSION['com'])){
  $com = new Player("わたし");
  // $st = new RsultStrategy();
  $com->setStrategy(new ResultStrategy($com));//上の行で今作ったnew comをセットする
  $_SESSION['com'] = serialize($com);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>じゃんけんゲーム</title>
</head>
<body>
<h1>じゃんけんゲーム</h1>
<form action="game.php" method="post">
<input type="radio" name="hand" id="gu" value="0"><!-- display=none ラジオボタンを消して画像をクリックできるようにする グー<img src>　inputタグをlabelで囲むのは推奨されていない-->
<label for="gu">グー</label><br/>

<input type="radio" name="hand" id="choki" value="1">
<label for="choki">チョキ</label><br/>

<input type="radio" name="hand" id="pa" value="2">
<label for="pa">パー</label><br/>

<!-- <input type="hidden" name="userName" value="<?php echo $userName; ?>" />
<input type="hidden" name="comName" value="<?php echo $comName; ?>" /> -->
<input type="submit" value="ok"/>
</form>
<p><a href="setting.php">設定</a></p>
</body>

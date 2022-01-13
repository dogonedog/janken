<?php
require_once('Player.php');
require_once('judge.php');

$userName = filter_input(INPUT_POST,'userName');
$comName = filter_input(INPUT_POST,'comName');

$options = [
  'options' => [
    'default' => 3,
    'min_range' => 0,
    'max_range' => 2
  ]
];
$userHand = filter_input(INPUT_POST, 'hand',
                         FILTER_VALIDATE_INT, $options);

// echo $userName, '<br>';
// echo $comName, '<br>';
// echo $userHand, '<br>';
$user = new Player($userName);
$user->setHand($userHand);
$com = new Player($comName);
$com->setHand(random_int(0, 2));
$judge = new Judge();
$msg = $judge->execute($user, $com);//勝敗結果が入ってくる
// $msg = "どちらかの勝ち";
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>じゃんけんゲーム結果</title>
  </head>
  <body>
    <h1>じゃんけんゲーム結果</h1>

    <p><?php echo $user->getName(); ?>:
      <?php echo $user->getHand(); ?></p>//0、1、2をセット

    <p><?php echo $com->getName(); ?>:
      <?php echo $com->getHand(); ?></p>

    <p><?php echo $msg; ?></p>

    <p><a href="/">もどる</a></p>
  </body>
</html>
<!-- 修正時刻: Tue Jan 11 12:32:21 2022 -->

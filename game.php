<?php
session_start();

require_once('Player.php');//読み込む
require_once('judge.php');
require_once('utill.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');

$user = unserialize($_SESSION['user']);//セッションからuserとってくる
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);


// $userName = $user->getName();
// $comName = $com->getName();
//$userName = filter_input(INPUT_POST,'userName');$userHand=(int)$_POST['hand'] sessionにあるので意味ない
//$comName = filter_input(INPUT_POST,'comName');

$options = [
  'options' => [
    'default' => 3,//0,1,2以外の数字が来たら3にする　
    'min_range' => 0,
    'max_range' => 2
    ]
  ];
$userHand = filter_input(INPUT_POST,'hand', FILTER_VALIDATE_INT, $options);//FILTER_VALIDATE_INTイント型に変換してくれる hand 0 1 2をとってくる

$hand = ['グー', 'チョキ', 'パー', '?'];

// echo $userName, '<br>';
// echo $comName, '<br>';
// echo $userHand, '<br>';
// $user = new Player($userName);sessionがあるのでいらない
$user->setHand($userHand);//グーチョキパーがおくられてくるのでいる
// $com = new Player($comName);
//$com->setHand(random_int(0, 2));整数のランダムjavaにはない　ここでcomの手がランダムでセットされている→$com->setNextHand();に変える
$com1->setNextHand();
$com2->setNextHand();
// $judge = new Judge();
//$msg = $judge->execute($user, $com);
$msg = Judge::execute($user, $com1, $com2);//クラスの呼び出しは::（コロン）executeメソッドをつくりかえる
//$msg = "どちらかの勝ち";
$_SESSION['user'] = serialize($user);
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);
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
  <h1>じゃんけんゲーム結果</h1>

  <p><?php echo h($user->getName()); ?>:
  <?php echo $hand[$user->getHand()]; ?></p>

  <p>
    <span title="<?php echo $com1->getStrategy()->getName(); ?>">
      <?php echo h($com1->getName()); ?>
    </span>:
      <?php echo $hand[$com1->getHand()]; ?>
  </p>

  <p>
  <span title="<?php echo $com2->getStrategy()->getName(); ?>"><!--pタグの中は1行にな　divは改行される-->
    <?php echo h($com2->getName()); ?>:
  </span>
    <?php echo $hand[$com2->getHand()]; ?>
    </p>



  <p><?php echo h($msg); ?></p>
  <p><a href="/php-class/">戻る</a></p>
</body>
</html>


<?php
session_start();
require_once('Player.php');

$userName = filter_input(INPUT_POST, 'userName');//$_POSTよりいい　ただ送られてこなくてもエラーにならない
$com1Name = filter_input(INPUT_POST, 'com1Name');
$com2Name = filter_input(INPUT_POST, 'com2Name');
if (empty($userName)){
  $userName = "あなた";
}
if(empty($com1Name)){
  $com1Name = "コム1";
}
if(empty($com2Name)){
  $com2Name = "コム2";
}

$user = unserialize($_SESSION['user']);//SESSION['userをもってきて
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);
$user->setName($userName);//名前をセットする
$com1->setName($com1Name);
$com2->setName($com2Name);
//$user = new Player($userName);//名前をつけてインスタンスを作る形
//$com = new Player($comName);
//sessionからとりだしてきて名前を変える

$_SESSION['user'] = serialize($user);//$_SESSIONは連想配列 $_SESSION保存にはserializeがいる　新しく名前を入れてセッションに保存
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);

header('Location:' . "/php-class/");
exit;
?>
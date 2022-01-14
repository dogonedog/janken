<?php
session_start();
require_once('Player.php');

$userName = filter_input(INPUT_POST, 'userName');//$_POSTよりいい　ただ送られてこなくてもエラーにならない
$comName = filter_input(INPUT_POST, 'comName');
if (empty($userName)){
  $userName = "あなた";
}
if(empty($comName)){
  $comName = "わたし";
}

$user = unserialize($_SESSION['user']);//SESSION['userをもってきて
$com = unserialize($_SESSION['com']);
$user->setName($userName);//名前をセットする
$com->setName($comName);
//$user = new Player($userName);//名前をつけてインスタンスを作る形
//$com = new Player($comName);
//sessionからとりだしてきて名前を変える

$_SESSION['user'] = serialize($user);//$_SESSIONは連想配列 $_SESSION保存にはserializeがいる　新しく名前を入れてセッションに保存
$_SESSION['com'] = serialize($com);

header('Location:' . "/php-class/");
exit;
?>
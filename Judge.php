<?php
class Judge {
  public static function execute($user, $com) {//newしないでもいい
    $userHand = $user->getHand(); // 0, 1, 2, 3
    $comHand = $com->getHand(); //0, 1, 2
    $msg = "";

if ($userHand === 3){
  $msg = "ちゃんと選択してね";
  return $msg;
}

    // 判定処理
    if (($userHand + 1) % 3 === $comHand) {
      $msg = $user->getName()."勝ち";
      $user->setResult("win");
      $com->setResult("lose");
    } else if ($userHand === $comHand) {
      $msg = "引き分け";
      $user->setResult("draw");
      $com->setResult("draw");
    } else {
      $msg = $com->getName()."勝ち";
      $user->setResult("lose");
      $com->setResult("win");
    }


    return $msg;//勝敗の結果をreturn
  }
}
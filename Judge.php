<?php
class Judge {
  public static function execute($user, $com1, $com2) {//newしないでもいい
    $userHand = $user->getHand(); // 0, 1, 2, 3
    $com1Hand = $com1->getHand(); //0, 1, 2
    $com2Hand = $com2->getHand(); //0, 1, 2
    $msg = "";

if ($userHand === 3){
  $msg = "ちゃんと選択してね";
  return $msg;
}

    // 判定処理
    if (($userHand + 1) % 3 === $com1Hand &&
        ($com1Hand === $com2Hand)) {
      $msg = $user->getName(). "勝ち";
      $user->setResult("win");
      $com1->setResult("lose");
      $com2->setResult("lose");
    }
    else if (($com1Hand + 1) % 3 === $userHand &&
            ($userHand === $com2Hand)) {
      $msg = $com1->getName()."勝ち";
      $user->setResult("lose");
      $com1->setResult("win");
      $com2->setResult("lose");
    }
    else if (($com2Hand + 1) % 3 === $userHand &&
    $userHand === $com1Hand)  {
    $msg = $com2->getName()."勝ち";
    $user->setResult("lose");
    $com1->setResult("lose");
    $com2->setResult("win");
    } 
    else{
      $msg = "引き分け";
      $user->setResult("draw");
      $com1->setResult("draw");
      $com2->setResult("draw");
    } 
    // else {
    //   $msg = $com->getName()."勝ち";
    //   $user->setResult("lose");
    //   $com->setResult("win");
    // }


    return $msg;//勝敗の結果をreturn
  }
}
<?php
class Judge {
  public function execute($user, $com) {
    $userHand = $user->getHand(); // 0, 1, 2, 3
    $comHand = $com->getHand(); //0, 1, 2
    $msg = "";

    // 判定処理
    if (($userHand + 1) % 3 === $comHand) {
      $msg = $user->getName() + "勝ち";
    } else if ($userHand === $comHand) {
      $msg = "引き分け";
    } else {
      $msg = $com->getName() + "勝ち";
    }


    return $msg;//勝敗の結果をreturn
  }
}

// 修正時刻: Tue Jan 11 12:51:17 2022

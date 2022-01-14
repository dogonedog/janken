<?php
require_once('StrategyInterface.php');

class ResultStrategy implements StrategyInterface {
  private $com;//$comを引数としてinterefaceのコンストラクタに実装したいけどできないので下のプロパティにコンストラクタを作り$com入れる

  public function __construct($com){
    $this->com = $com;
  }
/**
 * 次の手を決めるメソッド
 * 戻り値: $nextHand 0 1 2
 * 負けたなら、同じ手を出す
 * あいこなら、負ける手を出す
 */
  public function nextHand(){
    // $result => "win","lose","draw"
    $result = $this->com->getResult();
    $hand = $this->com->getHand();//"0""1""2"

     if ($result === "lose") {
      $nextHand = $hand;//さっきと同じ手
    } else if ($result === "draw"){
      $nextHand = ($hand + 1) % 3;
    } else {
      $nextHand = random_int(0,2);
    }
    return $nextHand;
  }
}
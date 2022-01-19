<?php
require_once('Strategy.php');

class ResultStrategy extends Strategy {
  private $com;//$comを引数としてinterefaceのコンストラクタに実装したいけどできないので下のプロパティにコンストラクタを作り$com入れる
  //$comは先ほどだした手と結果を持っている
  
  public function __construct($com){//ResultStrategyをnewするときに$comを引数にもつ　$st = new resultstrategy($com)
    parent::__construct();//引数があると親のコンストラクタが動かないので無理やり親のコンストラクタを動かす
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
    $result = $this->com->getResult();//comは結果を持っている
    $hand = $this->com->getHand();//"0""1""2"comは手を持っている

     if ($result === "lose") {
      $nextHand = $hand;//$hand=さっきと同じ手
    } else if ($result === "draw"){
      $nextHand = ($hand + 1) % 3;
    } else {
      $nextHand = random_int(0,2);
    }
    return $nextHand;
  }
}
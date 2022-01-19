<?php
require_once('Strategy.php');

class RandomStrategy extends Strategy {
  // public function __constructor(){

  // }コンストラクターに引数いらない

  public function nextHand(){
  $nextHand = random_int(0, 2);//0から2　return = random_int(0, 2);
    return $nextHand; //0,1,2
  }
}
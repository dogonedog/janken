<?php
require_once('StrategyInterface.php');

abstract class Strategy implements StrategyInterface {
  private $name;

  public function __construct(){
    $this->name = get_class($this);//ResultStrategy RandomStrategy newするとき名前を設定 get_class($this)子供の名前　$this->nameはこの親
  }

  public function getName(){
    return $this->name;
  }

  public abstract function nextHand();//抽象メソッドとして宣言するだけ　ResultStrategy RandomStrategy newするとき名前を設定
}
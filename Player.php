<?php

class Player {
  private $name;
  private $hand;
  private $result;
  private $strategy;//引数のstrategyをセットするcomはｒresultstaregyをもっている

  public function __construct($name) {//コンストラクター
    $this->name = $name;//this.name
  }

public function setStrategy($strategy){
  $this->strategy = $strategy;//引数のstrategyをプロパティのstrategyにセットする
}

//strategyが提案した手を次の手をセットする
public function setNextHand(){//this　フィールドのstrategyのnexthand（）を実行して012が返ってくるので$nexthandという名前で受け取る
 $nextHand = $this->strategy->nextHand();//012
 $this->setHand($nextHand);//下のsetHandを使ってプロパティにセット
}

 //getter
  public function getName() {// public function : string getName() {
    return $this->name;
  }
  public function getHand() {
    return $this->hand;
  }
  public function getResult() {
    return $this->result;
  }

  public function setName($name) {
    $this->name = $name;
  }
  public function setHand($hand) {
    $this->hand = $hand;
  }
  public function setResult($result) {
    $this->result = $result;
  }
}
?>


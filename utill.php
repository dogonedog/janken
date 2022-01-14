<?php
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");//ENT_QUOTES <>'"など
}
?>
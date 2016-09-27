<?php

if(isset($_GET['id'])){
  header("Location : detalle.php");
  require 'detalle.php';
}else{
  header("Location : todo.php");
  require 'todo.php';
}

?>

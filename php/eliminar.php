<?php 
  require_once "user.php";
  $usuarios = new Usuario();
  if(isset($_GET["usuario_id"])){
    $doc = ["usuario_id" =>$_GET["usuario_id"]];
    $eliminar = $usuarios->eliminar($doc);
    if($eliminar === true){
      header("location:index.php");
    }
  }
?>
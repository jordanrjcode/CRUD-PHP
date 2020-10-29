<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Sistema Crud</title>
</head>

<body>
  <?php 
    require_once "user.php";
    $usuarios = new Usuario();

    if(isset($_POST["nombre_usuario"]) && isset($_POST["edad_usuario"])){
      $doc = [
        "nombre_usuario" =>$_POST["nombre_usuario"], 
        "edad_usuario" => $_POST["edad_usuario"]
      ];
      $insertar = $usuarios->insertar($doc);
    }

  ?>
  <div class="container">
    <h1>Sistema Crud</h1>
    <form id="user-form" method="post" action="">
      <div class=" form-group">
        <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre">
        <input type="number" class="form-control" name="edad_usuario" placeholder="Edad ">
        <button type="submit" class="btn btn-primary" name="add">Add</button>

    </form>
  </div>
  <h2>Lista</h2>
  <?php 
    $lista = $usuarios->consultar();
  ?>
  <ul class="list-group">
    <?php 
      foreach ($lista as $users ) {
    ?>
    <li class="list-group-item  d-flex justify-content-between align-items-center" aria-disabled="true">
      <?php echo $users["nombre_usuario"]?> <div class="btn-group" role="group" aria-label="Basic example">
        <a href="edit.php?usuario_id=<?php echo $users["usuario_id"] ?>" class="btn btn-warning" id="edit">Editar</a>
        <a href="eliminar.php?usuario_id=<?php echo $users["usuario_id"] ?>" class="btn btn-danger">Eliminar</a>
      </div>
    </li>
    <?php
      }
    ?>
  </ul>
  </div>

</body>

</html>
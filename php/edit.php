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

    if(isset($_GET["usuario_id"])){
      $consultar = $usuarios->consultarOne($_GET["usuario_id"]);
    }

    if(isset($_POST["nombre_usuario"]) && isset($_POST["edad_usuario"])){
      $doc = [
        "nombre_usuario" =>$_POST["nombre_usuario"], 
        "edad_usuario" => $_POST["edad_usuario"]
      ];
      $insertar = $usuarios->actualizar($doc);
      if($insertar === true){
        header("location:index.php");
      }
    }

  ?>
  <div class="container">
    <h1>Sistema Crud</h1>
    <form id="user-form" method="post" action="edit.php">
      <div class=" form-group">
        <input type="text" class="form-control" name="nombre_usuario" value="<?php echo $consultar["nombre_usuario"] ?>"
          placeholder="Nombre">
        <input type="number" class="form-control" name="edad_usuario" value="<?php echo $consultar["edad_usuario"] ?>"
          placeholder=" Edad ">
        <button type="submit" class="btn btn-warning" name="add">Edit</button>

    </form>
  </div>

</body>

</html>
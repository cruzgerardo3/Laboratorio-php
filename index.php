<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoEstudiantil = $_POST['codigo_estudiantil'];
    $contrasena = $_POST['contrasena'];

    // Validar el inicio de sesión
    if ($codigoEstudiantil === 'u20221325' && password_verify($contrasena, password_hash('123', PASSWORD_DEFAULT))) {
        $_SESSION['usuario'] = $codigoEstudiantil;
        $_SESSION['rol'] = 'administrador'; // rustico, basico y administrador
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Credenciales inválidas";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-color: #343a40;">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Inicio de Sesión</h5>
      <form  method="post" action="">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="codigo_estudiantil">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </form>
      <?php if(isset($error)) { echo $error; } ?>
    </div>
  </div>
</div>


</body>
</html>
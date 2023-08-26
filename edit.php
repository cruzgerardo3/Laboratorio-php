<?php
session_start();

if ($_SESSION['rol'] !== 'administrador' && $_SESSION['rol'] !== 'rustico') {
    header('Location: index.php');
    exit();
}

$usuarios = [
    ['id' => 1, 'nombre' => 'Juana', 'apellido' => 'Monge', 'correo' => 'juana@example.com', 'rol' => 'administrador'],
    ['id' => 2, 'nombre' => 'Pedro', 'apellido' => 'Lopez', 'correo' => 'pedro@example.com', 'rol' => 'rustico'],
    ['id' => 3, 'nombre' => 'Martin', 'apellido' => 'Gomez', 'correo' => 'Martin@example.com', 'rol' => 'basico']
];

$id = $_GET['id'] ?? '';
$usuarioEditar = null;

foreach ($usuarios as $usuario) {
    if ($usuario['id'] == $id) {
        $usuarioEditar = $usuario;
        break;
    }
}

if (!$usuarioEditar) {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica para guardar cambios
    $mensaje = "Cambios realizados en el registro " . $id;
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Mi Sitio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="#">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Formulario</h2>
                <form method="post" action="" >
                    <div class="mb-3">
                        <label for="campo1" class="form-label">Campo 1</label>
                        <input name="id" value="<?php echo $usuarioEditar['id']; ?>" type="text" class="form-control" id="campo1" placeholder="Ingrese el campo 1">
                    </div>
                    <div class="mb-3">
                        <label for="campo2" class="form-label">Campo 2</label>
                        <input type="text" name="nombre" value="<?php echo $usuarioEditar['nombre']; ?>" class="form-control" id="campo2" placeholder="Ingrese el campo 2">
                    </div>
                    <div class="mb-3">
                        <label for="campo3" class="form-label">Campo 3</label>
                        <input type="text" name="apellido" value="<?php echo $usuarioEditar['apellido']; ?>" class="form-control" id="campo3" placeholder="Ingrese el campo 3">
                    </div>
                    <div class="mb-3">
                        <label for="campo3" class="form-label">Campo 3</label>
                        <input type="text" name="correo" value="<?php echo $usuarioEditar['correo']; ?>" class="form-control" id="campo3" placeholder="Ingrese el campo 3">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="mostrarMensaje()">Enviar</button>
           
                </form>
                <?php if(isset($mensaje)) { echo $mensaje; } ?>
                <div class="mt-3 alert alert-success d-none">
               
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 <!-- Incluye Bootstrap JS (jQuery y Popper.js son necesarios) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.min.js"></script>
 <script>
    function mostrarMensaje() {
        // Muestra el mensaje de éxito después de hacer clic en el botón "Enviar"
       // document.querySelector('.alert-success').classList.remove('d-none');
        
    }
</script>
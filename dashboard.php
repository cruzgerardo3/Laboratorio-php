<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || empty($_SESSION['usuario']) || empty($_SESSION['rol'])) {
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $mensaje = "Se elimino el reguistro " . $id;
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
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  
    <div class="container mt-5">
        <h2 class="text-center">Modifique segun requiera</h2>
       <form method="post" action="" >
        <div class="table-responsive">
            <table class="table table-bordered table-striped" metho>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Rol</th>
                     <th>Acciones</th>
                    </tr>
                    
                </thead>
                <tbody>
                    
                    <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td> <?php echo $usuario['id']; ?> </td>
                        <td> <?php echo $usuario['nombre']; ?></td>
                        <td> <?php echo $usuario['apellido']; ?> </td>
                        <td> <?php echo $usuario['correo']; ?> </td>
                        <td> <?php echo $usuario['rol']; ?> </td>
                        <td>
                        <?php if ($_SESSION['rol'] === 'administrador') { ?>

                            <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <button <?php echo $usuario['id']; ?> type="submit" class="btn btn-danger btn-sm" >Eliminar</button> 


                       
                           
                            <?php } ?>

                            <?php if ($_SESSION['rol'] === 'rustico') { ?>
                                <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    
                            <?php } ?>
                        </td>
                    <?php } ?>
                    </tr>

                    
                                    <!-- Agrega más filas según sea necesario -->
                </tbody>
                
 
            </table>
         

        </div>
        </form>
        <?php if(isset($mensaje)) { echo $mensaje; } ?>
        
       
            
    </div>
    

</body>
</html>

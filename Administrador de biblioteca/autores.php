<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$sql = "SELECT * FROM autor";
$consulta = ejecutarSQL::consultar($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <title>Autores</title>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="autores.php">Autores</a>

                </div>
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="libros.php">Libros</a>

                </div>
            </div>
        </div>
    </nav>

    <br>
    <div class="container mt-4">
        <div class="row">
            <h1 align="center" style="background-color: cyan;">AGREGAR AUTORES</h1>
        </div>
        <div class="row">
            <form method="post" id="registro" name="registro" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombres:</label>
                    <input type="text" class="form form-control" name="nombre" id="nombre" autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="apellido">Apellidos:</label>
                    <input type="text" class="form form-control" name="apellido" id="apellido" autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="aliasAutor">Alias del autor:</label>
                    <input type="text" class="form form-control" name="aliasAutor" id="aliasAutor">
                </div>
                <br>
                <div class="form form-group">
                    <button class="btn btn-primary" id="Agregar" name="Agregar" type="submit">Insertar registro</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["Agregar"])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $alias = $_POST['aliasAutor'];

        $insertar = consultasSQL::InsertSQL("autor", "nombres, apellidos, alias_de_autor", "'$nombre', '$apellido', '$alias'");
        print "<script>window.setTimeout(function() { window.location = 'http://localhost/Examen3/autores.php' }, 1000);</script>";
    }
    ?>
    <br><br>
    <div class="container-md">
        <div class="row">
            <h1 align="center">Administración de Autores</h1>
        </div>
        <br>
        <table id="tabla" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Alias de Autor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $consulta->fetch_assoc()) {?>
                    <tr>
                        <th><?php echo $fila['id_autor']; ?></th>
                        <th><?php echo $fila['nombres'] . " " . $fila['apellidos']; ?></th>
                        <th><?php echo $fila['alias_de_autor']; ?></th>
                        <th>
                            <form method='get' action='elimAutor.php'>
                                <input type='hidden' name='var' value='<?php echo $fila['id_autor']; ?>'>
                                <input type='submit' value='Eliminar' style='background-color: lightcoral;'>
                            </form>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
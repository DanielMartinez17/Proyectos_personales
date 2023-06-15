<?php
require_once("librerias/configServer.php");
require_once("librerias/consulSQL.php");

$sql = "SELECT
`libros`.*,
`autor`.`nombres`,
`autor`.`apellidos`,
`autor`.`alias_de_autor`
FROM
`examen3php`.`libros`
INNER JOIN `examen3php`.`autor`
  ON (
    `libros`.`idautor` = `autor`.`id_autor`
  );";
$consulta = ejecutarSQL::consultar($sql);

$sql2 = "SELECT * FROM autor";
$consulta2 = ejecutarSQL::consultar($sql2);
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
            <h1 align="center" style="background-color: cyan;">AGREGAR LIBROS</h1>
        </div>
        <div class="row">
            <form method="post" id="registro" name="registro" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form form-control" name="isbn" id="isbn" autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="nombreLibro">Nombre del libro:</label>
                    <input type="text" class="form form-control" name="nombreLibro" id="nombreLibro"  required>
                </div>
                <br>
                <div class="form-group">
                    <label for="anoPublic">Año de publicación:</label>
                    <input type="number" class="form form-control" name="anoPublic" id="anoPublic"  required>
                </div>
                <br>
                <div class="form-group">
                    <label for="volumen">Volumen:</label>
                    <input type="number" class="form form-control" name="volumen" id="volumen"  required>
                </div>
                <br>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="form form-control" name="categoria" id="categoria">
                        <option value="Novela">Novela</option>
                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                        <option value="Comedia">Comedia</option>
                        <option value="Clásico">Clásico</option>
                    </select>
                </div>
                <br>
                <div class="form form-group">
                    <label for="imagen">Foto:</label>
                    <input type="file" class="form form-control" name="imagen" id="imagen" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select class="form form-control" name="autor" id="autor">
                        <?php
                        while ($fila = mysqli_fetch_array($consulta2)) {
                            echo "<option value='" . $fila['id_autor'] . "'>" . $fila['apellidos'] ." , ". $fila['nombres'] ." - ". $fila['alias_de_autor']."</option>";
                        }
                        ?>
                    </select>
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
        $isbn = $_POST['isbn'];
        $nombreLibro = $_POST['nombreLibro'];
        $anoPublic = $_POST['anoPublic'];
        $volumen = $_POST['volumen'];
        $categoria = $_POST['categoria'];
        $autor = $_POST['autor'];

        $verificar = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($verificar !== false) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $insertar = consultasSQL::InsertSQL("libros", "isbn, nombre_libro, year_publicacion, volumen, categoria, foto, idautor", "'$isbn', '$nombreLibro', '$anoPublic', '$volumen','$categoria','$imgContent', '$autor'");
            print "<script>window.setTimeout(function() { window.location = 'http://localhost/Examen3/libros.php' }, 1000);</script>";

        }
       
    }
    ?>
    <br><br>
    <div class="container-md">
        <div class="row">
            <h1 align="center">Administración de Libros</h1>
        </div>
        <br>
        <table id="tabla" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imformación del libro</th>
                    <th>ISBN</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $consulta->fetch_assoc()) {?>
                    <tr>
                        <th><?php echo $fila['idlibro']; ?></th>
                        <th>Autor: <?php echo $fila['nombres'] . " " . $fila['apellidos']."<br>".$fila['alias_de_autor']."<br><br>".'<img style="height:80px; width:80px;" src="data:image/jpeg;base64,' . base64_encode($fila['foto']) . '"/>'."<br>". "Nombre: ".$fila['nombre_libro']."<br>".$fila['categoria']." Publicado en:". $fila['year_publicacion'] ; ?></th>
                        <th><?php echo $fila['isbn']; ?></th>
                        <th>
                            <form method='get' action='elimLibro.php'>
                                <input type='hidden' name='var' value='<?php echo $fila['idlibro']; ?>'>
                                <input type='submit' value='Eliminar' style='background-color: lightcoral;'>
                            </form>
                        </th>
                        <th>
                            <form method='get' action='actuLibro.php'>
                                <input type='hidden' name='var' value='<?php echo $fila['idlibro']; ?>'>
                                <input type='submit' value='Actualizar' style='background-color: yellow;'>
                            </form>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
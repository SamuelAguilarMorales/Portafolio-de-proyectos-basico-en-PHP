<?php include 'cabecera.php'; ?>
<?php include 'conexion.php'; ?>

<?php

if($_POST){
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $fecha = new DateTime();
  $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];
  $imagen_temporal=$_FILES['archivo']['tmp_name'];
  move_uploaded_file($imagen_temporal,"img/".$imagen);
  $objConexion = new conexion();
  $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion')";
  $objConexion->ejecutar($sql); 
  header("Location: portafolio.php");
}


if($_GET){

  $objConexion = new conexion();
  $imagen = $objConexion->consultar("SELECT imagen FROM proyectos WHERE id=".$_GET['borrar']);
  unlink("img/".$imagen[0]['imagen']);

  $sql = "DELETE FROM proyectos WHERE id =".$_GET['borrar'];
  $objConexion->ejecutar($sql);
  header("Location: portafolio.php");
}

$objConexion = new conexion();
$resultado = $objConexion->consultar("SELECT * FROM proyectos");
?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1>Datos del proyecto</h1>
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <label for="nombre">Nombre del proyecto</label>
                        <input class="form-control" type="text" name="nombre" id="" require>
                        <br>
                        <label for="archivo">Nombre del proyecto</label>
                        <input class="form-control" type="file" name="archivo" id="" require>
                        <br>
                        <div class="mb-3">
                          <label for="form-label">Descipción</label>
                          <textarea class="form-control" name="descripcion" id="" rows="3" require></textarea>
                        </div>
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                      <?php foreach($resultado as $proyecto){ ?>
                    <tr>
                        <td><?php echo $proyecto['id']; ?></td>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td><img width="100" src="img/<?php echo $proyecto['imagen']; ?>" alt=""></td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'pie.php'; ?>
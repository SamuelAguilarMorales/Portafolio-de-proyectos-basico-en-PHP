<?php include 'cabecera.php'; ?>
<?php include 'conexion.php'; ?>
<?php 

$objConexion = new conexion();
$resultado = $objConexion->consultar("SELECT * FROM proyectos");

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenid@s</h1>
        <p class="lead">Portafolio de Samuel Aguilar Morales</p>
        <hr class="my-2">
        <p>Mas información</p>
    </div>
</div>


<h1 class="text-center"> Mis proyectos</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($resultado as $proyecto){ ?>
    <div class="col">
        <div class="card">
            <img width="100" class="card-img-top" src="img/<?php echo $proyecto['imagen']; ?>" alt="">
            <div class="card-body">
                <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
                <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>



<?php include 'pie.php'; ?>
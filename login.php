<?php
session_start();

if($_POST){
    if(($_POST['usuario'] == 'Samuel') && ($_POST['password'] == '123456')){
        $_SESSION['usuario']="Samuel";
        header("Location: index.php");

    }else{
        echo "<script> alert('Contraseña incorrecta'); </script>";
    }
}

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                <br>
                    <div class="card">
                        <div class="card-header">
                            <h1>Iniciar Sesión</h1>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <label for="usuario">Usuario:</label>
                                <input class="form-control" type="text" name="usuario" id="">
                                <br>
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" name="password" id="">
                                <br>
                                <button type="submit" class="btn btn-success">Entrar al portafolio</button>
                            </form>
                        </div>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

   
  </body>
</html>
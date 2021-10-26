
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Agenda de Contantos Personal</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="bootstrap/css/custom.css" rel="stylesheet"> -->
    

    <!-- Custom styles for this template -->

  </head>

  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown03">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form>
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>

    <div  class="container">
        <h1 class="page-header text-center">Agenda de contactos</h1>

        <div class="row">

            <div class="col-12">
                <a href="#addNew" class="col-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew">Nuevo</a>

                <?php session_start(); ?>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="col-4 alert alert-success mt-3" role="alert">
                        <?=$_SESSION['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif (isset($_SESSION['error'])): ?>
                    <div class="col-4 alert alert-danger mt-3" role="alert">
                        <?=$_SESSION['error']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['error']);
                ?>
                

                <table class="col-12 table table-bordered table-striped mt-4 text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include_once 'conexion.php';
                        $database = new Conexion();
                        $db = $database->open();

                        try {
                            $sql = "SELECT * FROM personas;";
                            $personas = $db->query($sql);
                        ?>
                            <?php foreach ($personas as $persona): ?>
                                <tr>
                                    <td><?=$persona['idPersona']?></td>
                                    <td><?=$persona['nombre']?></td>
                                    <td><?=$persona['telefono']?></td>
                                    <td><?=$persona['email']?></td>
                                    <td><?=$persona['direccion']?></td>
                                    <td>
                                        <a href="#edit_<?=$persona['idPersona'];?>" class="btn btn-sm btn-success me-1" data-bs-toggle="modal">Editar</a>
                                        <a href="#delete_<?=$persona['idPersona'];?>" class="btn btn-sm btn-danger ms-1" data-bs-toggle="modal">Eliminar</a>
                                    </td>

                                    <?php include('EditarEliminarModal.php'); ?>
                                    
                                </tr>
                            <?php endforeach; ?>
                        
                        <?php
                        } catch (PDOException $e) {
                            echo 'Ocurrió un problema con la conexión a la Base de datos: '.$e->getMessage();
                        }

                        $database->close();

                        ?>                 
                        
                        
                    </tbody>
                </table>
            </div>
            
        </div>

        
      
    </div><!-- /.container -->

    <?php include('addModal.php'); ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
include 'data/DBGestLib.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Usuarios E&L</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Usuarios E&L</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Inicio</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" id="listado">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Buscador de Usuarios</h1>
                    <hr class="divider" />
                </div>
                
            </div>
            
        </div> 
    </header>
   
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <br>
        <div class="container px-4 px-lg-2 text-center">
        <form id="contactForm" method="post">
        <p class="text-white">Ingrese el ID del usuario que desee buscar!</p>
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control form-control-sm mx-auto" id="id" name="id" type="text" placeholder="Enter your ID..." required style="max-width: 300px;"/>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-x5 mx-auto" id="submitButton" type="submit" style="width: 100px;">Buscar</button>
                    </div>
        </form>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            
            $DBGestion = new DBGestLib();
            $usuario = $DBGestion->getUsuarios($id);
        
            
          }
        if ($usuario) {
        // Mostramos la tabla con los datos del usuario
        echo '<table class="table table-dark table-bordered table-striped table-hover">';
        echo '<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Foto</th>
              </tr>';

        foreach ($usuario as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['id'] . '</td>';
            echo '<td>' . $registro['nombre'] . '</td>';
            echo '<td>' . $registro['correo'] . '</td>';
            echo '<td>' . $registro['telefono'] . '</td>';
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($registro['foto']) . '" alt="Foto" width="100" height="100"></td>';
            echo '</tr>';
        }

        echo '</table>';
    } 
    ?>
            <br>
            <h2 class="mb-4">Gracias por usar nuestros servicios</h2>
            <h2>:)</h2>
        </div>
    </section>
    
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Esteban Montero Sánchez 2022-0376</div></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


</body>
</html>

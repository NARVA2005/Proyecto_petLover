<?php

require_once './Clases/MySQL.php';

$mysql = new MYSQL();
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT * FROM petlover.producto where estado='activo'");
$mysql->desconectar();

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["boton"])) {
        $valorBoton = $_POST["boton"];
        // Asigna el valor del botón al campo de entrada de texto
        $valorCampoTexto = $valorBoton;
    } else {
        $valorCampoTexto =  "No se ha enviado el valor del botón.";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/css.css">
</head>

<body>

  

<div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Abierto Desde</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email</h6>
                        <p class="m-0">PetLover@gmail.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Telefono</h6>
                            <p class="m-0">57 300 726 9738</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="../index.html" class="nav-item nav-link">Inicio</a>
                 
                  

                    <a href="#" class="nav-item nav-link">Metodos de pago</a>


                
                        
                    <a href="#" class="nav-item nav-link">Productos</a>
                     
                         
                         
                   
            
                </div>
                <a href="" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Comprar</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <div class="container">
    <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-3 text-capitalize x"><span class="text-primary">Productos</span></h1>
                </a>
                <style>
                    .x{
                        text-align: center;  
                    }
                </style>
<div class="row">

  <!-- Iterar sobre los productos -->
  <?php while ($fila = mysqli_fetch_array($consulta)): ?>

    <div class="col-md-2">
      <div class="card">
        <img src="<?php echo $fila[4]; ?>" class="card-img-top producto">
        <div class="card-body">
          <h5 class="card-title"><?php echo $fila[1]; ?></h5>
          <p class="card-text">Precio:<?php echo $fila[3]; ?></p>
          <p class="card-text">Cantidad:<?php echo $fila[2]; ?></p>
          <button class="btn btn-dark">🛒</button>
        </div>
      </div>
    </div>

  <?php endwhile; ?>

</div>

</div>

<style>
    .card {
  border: 2px solid #ad7d52;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(173, 125, 82, 0.3);  
}

.card-img-top {
  border-top-left-radius: 10px; 
  border-top-right-radius: 8px;
}

.card-body {
  background: #f8f4ea;
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;  
  padding: 10px;
}

.card-title {
  color: #ad7d52;
  font-size: 16px;
  font-weight: 500;
  text-align: center;  
}

.card-text {
  font-size: 12px;
  color: #555555;
}

.btn-primary {
  background-color: #ad7d52;
  color: white;
  border: none;
  border-radius: 20px;
  padding: 8px 20px;
  font-size: 16px;  
}

.btn-primary:hover {
  background-color: #8d6942;
}
</style>
      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Lover</h1>
              
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Punto de contacto/h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>carrera 7 13-41, Colombia, Cartago Valle</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>3007269738</p>
                        <p><i class="fa fa-envelope mr-2"></i>petlover@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                   
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Boletin informativo</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Gmail" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Aplique ahora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Nombre del sitio</a>.Reservado todos los derechos. Diseñado por Alejo y Narva(programadores)
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/cantidadProducto.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
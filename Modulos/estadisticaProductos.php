<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "petlover";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para contar el número de veces que se ha utilizado cada servicio
$sql = "SELECT p.descripcion AS producto, COUNT(*) AS veces_comprados
        FROM detalle_factura_producto dfc
        INNER JOIN producto p ON dfc.id_producto = p.id
        GROUP BY dfc.id_producto";
$result = $conn->query($sql);

$servicios = [];
$veces_comprados = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $producto[] = $row['producto'];
        $veces_comprados[] = $row['veces_comprados'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
 <!-- Agrega jQuery y Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
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
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/css.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

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
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
           Productos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/Empleados.php">Historial de productos</a></li>
                <li><a class="dropdown-item" href="productosDesactivados.php">Prodcutos inactivos</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
       Clientes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/Clientes.php">Historial de Clientes</a></li>
                <li><a class="dropdown-item" href="clientesDesactivados.php">Clientes inactivos</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Mascotas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/mascotas.php">Historial de mascotas</a></li>
                <li><a class="dropdown-item" href="mascotasDesactivadas.php">mascotas inactivos</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Servicios
              </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/agregarServicios.php">Historial de Servicios</a></li>
                <li><a class="dropdown-item" href="../Modulos/ServiciosDesactivados.php">Servicios inactivos</a></li>
              </ul>
           
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Estadisticas
              </a>
              <ul class="dropdown-menu  ">
             
                <li><a class="dropdown-item" href="../Modulos/estadisticaIngresos.php">Estadisticas de desempeño de ingreso</a></li>
                <li><a class="dropdown-item" href="../Modulos/estadisticaServicios.php">Estadisticas de servicios mas pópulares</a></li>
                <li><a class="dropdown-item" href="../Modulos/estadisticaProductos.php">Estadisticas de productos mas vendidos</a></li>
          
              </ul>
            </li>
          
                </div>
                <a href="../index.html" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Cerrar sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <h1>Productos más comprados</h1>
    <div>
        <canvas id="barChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($producto); ?>,
                datasets: [{
                    label: 'Veces comprados',
                    data: <?php echo json_encode($veces_comprados); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <!-- Template Javascript -->
  <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>

<?php

require_once './Clases/MySQL.php';

$mysql = new MYSQL();
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT * FROM petlover.producto where estado='activo'");
$mysql->desconectar();


if (isset($_SESSION['correo']) && $_SESSION['correo'] != "" && isset($_SESSION['contra']) && $_SESSION['contra'] != ""){

 
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
 <!-- Agrega jQuery y Bootstrap JS -->
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
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
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
                   
                <a href="../Modulos/Empleados.php" class="nav-item nav-link">Productos</a>
                    <a href="../Modulos/Clientes.php" class="nav-item nav-link">Clientes</a>
                    <a href="../Modulos/mascotas.php" class="nav-item nav-link">Mascotas</a>
                    <a href="productosDesactivados.php" class="nav-item nav-link">Productos Eliminados</a>
                 
                </div>
                <a href="../index.html" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Cerrar sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <div class="container  pt-5 ">
        <div class="d-flex flex-column text-center mb-5 pt-5 ">
          
            <h1 class="display-4 m-0"><span class="text-primary">PetLover</span>Productos</h1>
        </div>
       
          <!-- Button trigger modal -->
          <!-- //formulario para ingresar productos -->

<div class="row d-flex justify-content-center">

<div class="col-6">
<table class="table"> 

<thead class = "text-center thead-dark">

<th>id</th>
<th>Descripcion</th>
<th>Stock</th>
<th>Precio</th>
<th>Imagen</th>
<th>Estado</th>
<th></th>
<th></th>
</thead >
<tbody>

<tbody>
                                        <?php
                                         
                                        while ($fila = mysqli_fetch_array($consulta)) {
                                       
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $fila[0]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[1]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[2]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[3]; ?>
                                                </td>
                                                <td>

                                                    <img src=" <?php echo $fila[4]; ?>" alt="" srcset="<?php echo $fila[4]; ?>" class="img">
                                                   

                                                </td>
                                                <td>
                                                    <?php echo $fila[5]; ?>
                                                </td>
                                                <td>
                                                   
                                                <button type="button" class="btn btn-primary edit-product" data-id="<?php echo $fila[0]; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">✎</button>
                             
                                                </td>
                                                <td>
                                                <a onclick="idProductoEstado('<?php echo $fila[0] ?>')" class="btn btn-primary" href="#">🗑</a>
                                            </tr>

                                        <?php
                                        }
                                        ?>


</tbody>


</table>

</div>



</div>







<div class="row d-flex justify-content-center">
<div class="col-2">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
 Ingresar producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="editProductForm" action="./Controladores/llenarCamposEditar.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="idProducto" class="form-label">Id del producto</label>
            <input type="number" class="form-control" id="idProductoModal" aria-describedby="emailHelp" name="id" readonly>
          </div>
          <div class="mb-3">
            <label for="nombreProducto" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombreProducto" aria-describedby="emailHelp" name="descripcion" >
          </div>
          <div class="mb-3">
            <label for="stockProducto" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stockProducto" aria-describedby="emailHelp" name="Stock" >
          </div>
          <div class="mb-3">
            <label for="precioProducto" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precioProducto" aria-describedby="emailHelp" name="Precio" >
          </div>
          <div class="mb-3">
            <label for="imagenProducto" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagenProducto" aria-describedby="emailHelp" name="Imagen" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
      $(document).ready(function() {
    $('.edit-product').click(function() {
        var idProducto = $(this).data('id');
        var nombreProducto = $(this).closest('tr').find('td:eq(1)').text();
        nombreProducto = nombreProducto.trim(); // Obtiene el nombre del producto de la segunda celda de la fila
        var stockProducto = $(this).closest('tr').find('td:eq(2)').text().trim(); // Obtiene el stock del producto de la tercera celda de la fila
        var precioProducto = $(this).closest('tr').find('td:eq(3)').text().trim(); // Obtiene el precio del producto de la cuarta celda de la fila
        
        $('#idProductoModal').val(idProducto);
        $('#nombreProducto').val(nombreProducto); 
        $('#stockProducto').val(stockProducto); 
        $('#precioProducto').val(precioProducto);  
    });
});


    </script>


<div class="col-2">
<!-- Formulario para editar productos -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form action="./Controladores/registroProducto.php" method="post" enctype="multipart/form-data">

     <div class="mb-3">

   
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
    <input type="text" class="form-control" id="nombreProducto" aria-describedby="emailHelp" name="nombreProducto">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stockProduct" aria-describedby="emailHelp" name="stockProduct">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio" aria-describedby="emailHelp" name="precio">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Imagen</label>
    <input type="file" class="form-control" id="urlImage" aria-describedby="emailHelp" name="urlImage">
   
  </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
      </div>
      
</form>
    </div>
  </div>
</div>
</div>



<div class="col-2">


<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deshabilitar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="editProductForm" action="./Controladores/DesactivarProducto.php" method="GET">

      <div class="mb-3">
            <label for="idProducto" class="form-label">Id del producto</label>
            <input type="number" class="form-control" id="idProductoEliminar" aria-describedby="emailHelp" name="id" readonly>
          </div>



 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
 </div>
 
</form>

      </div>
    
    </div>
  </div>
</div>
<script>
        $(document).ready(function() {
    $('.elim-producto').click(function() {
        var idProducto = $(this).data('id');
    
        
        $('#idProductoEliminar').val(idProducto);
 
    });
});
    </script>
</div>




</div>







        </div>
    </div>
    <script>
const idProductoEstado = (id) => {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    // Mostrar el cuadro de diálogo de confirmación
    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro?",
        text: "Esta acción cambiará el estado del producto.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, cambiar estado",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la solicitud POST al servidor PHP para cambiar el estado del producto
            fetch('./Controladores/DesactivarProducto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id,
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta del servidor
                if (data.success) {
                    swalWithBootstrapButtons.fire({
                        title: "Éxito",
                        text: "El estado del producto se ha cambiado correctamente.",
                        icon: "success"
                    }).then(() => {
                        // Recargar la página
                        location.reload();
                    });
                } else {
                    swalWithBootstrapButtons.fire({
                        title: "Error",
                        text: "Hubo un error al cambiar el estado del producto.",
                        icon: "error"
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swalWithBootstrapButtons.fire({
                    title: "Error",
                    text: "Hubo un error al comunicarse con el servidor.",
                    icon: "error"
                });
            });
        }
    });
}
</script>
    <!-- Blog End -->


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
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>

  
</body>

</html>
<?php
}
else{
echo "GAYS";
}
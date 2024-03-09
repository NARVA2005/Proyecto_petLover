const btnI = document.getElementById("btnIniciar");
btnI.addEventListener("click", (e) => {

  let correo = document.getElementById("correo").value;
  let contra = document.getElementById("contra").value;

  e.preventDefault();




  if (correo === "" || contra === "") {
    Swal.fire({
      title: "Hay campos vacíos papá",
      width: 600,
      padding: "3em",
      color: "#716add",
    });
  } else {

    console.log("hola");
  }
});


    // Si no hay campos vacíos, enviamos el formulario

    document.getElementById("formularioIncio").submit();




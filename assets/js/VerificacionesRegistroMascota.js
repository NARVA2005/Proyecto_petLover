const btnRe = document.getElementById("btnRegistromascota");
btnRe.addEventListener("click", (e) => {


  e.preventDefault(); // Usamos preventDefault en lugar de defaultPrevented()

  let nombre = document.getElementById("nombres").value;
  let tipo = document.getElementById("tipo").value;
  let raza = document.getElementById("raza").value;
  let nota = document.getElementById("nota").value;
  let cliente = document.getElementById("id_cliente").value;



  if (nombre === "" || tipo === "" || raza === "" || nota === "" || cliente === "") {
    Swal.fire({
      title: "Hay campos vacíos papá",
      width: 600,
      padding: "3em",
      color: "#716add",
    });

  } else {
    // Si no hay campos vacíos, enviamos el formulario
    document.getElementById("formRegistroMascotas").submit();
  }
});

  


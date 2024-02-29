function validarForm(formulario){

  const expRegNumDiagnostico = /^D\d{6}\/\d{2}$/;
  let numDiagnostico = formulario.diagnostico.value;
  let placa = formulario.placa.value;
  let idDepEnt = parseInt(formulario.idDepEnt.value);

  if ( !expRegNumDiagnostico.test(numDiagnostico)) {
    alert('El numero de diagnostico no es correcto.');
    formulario.diagnostico.style.background = "red";
    return false;
  }

  if(placa.length <= 4) {
    alert('La placa debe llenarse correctamente.');
    formulario.placa.style.background = "red";
    return false;
  }

  if (isNaN(idDepEnt)){
    alert('El dependencia debe llenarse correcto.');
    formulario.idDepEnt.style.background = "red";
    return false;
  }

  if(idDepEnt < 1) {
    alert('El dependencia debe llenarse correcto.');
    formulario.idDepEnt.style.background = "red";
    return false;
  }

  alert("Formulario llenado correctamente");
  formulario.submit();

}

window.onload = function(){
  const formulario = document.getElementById("formulario");
}

formulario.addEventListener("focus", (evento) => {

  if (evento.target.id == "enviar_btn"){
  } else {

  evento.target.style.background = "yellow";
  }
}, true);

formulario.addEventListener("blur", (evento) => {

  if (evento.target.id == "diagnostico"){
    //evento.target.style.background = "yellow";

    const expRegNumDiagnostico = /^D\d{6}\/\d{2}$/;
    let numDiagnostico = formulario.diagnostico.value;

    if ( !expRegNumDiagnostico.test(numDiagnostico)) {
      alert('El numero de diagnostico no es correcto.');
      evento.target.style.background = "red";
    } else {
      evento.target.style.background = "";
    }
  } else {
    evento.target.style.background = "";
  }
}, true);


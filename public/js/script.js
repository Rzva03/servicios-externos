/* -------------------------------------------------------------------------- */
/*                               Custom Scripts                               */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  Variables                                 */
/* -------------------------------------------------------------------------- */
let fechaInicial;
let fechaFinal;
let valorTrimestre;
let valorAnio;
let inputInicial = document.getElementById("txtFechaInicial");
let inputFinal = document.getElementById("txtFechaFinal");
let array = [];
let arregloAux = [];
let txtCarrera = document.getElementById("txtCarreras");
let inlineCheckboxEmail = document.getElementById("inlineCheckboxEmail"),
    inlineCheckboxTel = document.getElementById("inlineCheckboxTel"),
    divEmail = document.getElementById("divEmail"),
    divTelefono = document.getElementById("divTelefono"),
    txtEmail = document.getElementById("txtEmail"),
    txtTelefono = document.getElementById("txtTelefono");
/* -------------------------------------------------------------------------- */
/*       funcion para obtener el id del opcion selecionada de un select       */
/* -------------------------------------------------------------------------- */
function agregarID(idSelector, idInput) {
    let valorSeleccionado = idSelector.value;
    idInput.value = valorSeleccionado;
}
/* -------------------------------------------------------------------------- */
/*                                  busqueda                                  */
/* -------------------------------------------------------------------------- */

function busquedaTabla() {
    let input, filter, table, tr, td, i;
    input = document.getElementById("busqueda");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            let tdata = td[j];
            if (tdata) {
                if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
/* -------------------------------------------------------------------------- */
/*           conversion de fecha para el reporte de los indicadores           */
/* -------------------------------------------------------------------------- */
function convertirFechaPorTrimestre(idSelectorTrimestre) {
    valorTrimestre = idSelectorTrimestre.value;
    switch (valorTrimestre) {
        case "1":
            fechaInicial = "-01-01";
            fechaFinal = "-03-31";
            break;
        case "2":
            fechaInicial = "-04-01";
            fechaFinal = "-06-31";
            break;
        case "3":
            fechaInicial = "-07-01";
            fechaFinal = "-09-31";
            break;
        case "4":
            fechaInicial = "-10-01";
            fechaFinal = "-12-31";
            break;
    }
    if (valorAnio === undefined) {
        let fechaInicialAux = localStorage.getItem("anio") + fechaInicial;
        let fechaFinalAux = localStorage.getItem("anio") + fechaFinal;
        inputInicial.value = fechaInicialAux;
        inputFinal.value = fechaFinalAux;
        console.log(fechaInicialAux, fechaFinalAux);
    }
    localStorage.setItem("fechaInicial", fechaInicial);
    localStorage.setItem("fechaFinal", fechaFinal);
}
function convertirFechaPorAnio(idSelectorAnio, idInputFI, idInputFC) {
    let anioCompletoI;
    let anioCompletoF;
    valorAnio = idSelectorAnio.value;
    localStorage.setItem("anio", valorAnio);
    if (fechaFinal === undefined && fechaInicial === undefined) {
        anioCompletoI = valorAnio + localStorage.getItem("fechaInicial");
        anioCompletoF = valorAnio + localStorage.getItem("fechaFinal");
    } else {
        anioCompletoI = valorAnio + fechaInicial;
        anioCompletoF = valorAnio + fechaFinal;
    }
    idInputFI.value = anioCompletoI;
    idInputFC.value = anioCompletoF;
}
/* -------------------------------------------------------------------------- */
/*                 Obtener carreras que pertenecen al convenio                */
/* -------------------------------------------------------------------------- */
function crearArregloCarrera(idCheck) {
    if (idCheck.checked) {
        array.push(idCheck.value);
    } else {
        let pos = array.indexOf(idCheck.value);
        array.splice(pos, 1);
    }
    txtCarrera.value = array;
}
/* -------------------------------------------------------------------------- */
/*                         Obtener todas las carreras                         */
/* -------------------------------------------------------------------------- */

let cbTodasCarreras = document.getElementById("flexCheckChecked_todasCarreras");
function obtenerTodasCarreras(arregloCarrera) {
    if (cbTodasCarreras.checked) {
        arregloCarrera.forEach((elemento) => {
            arregloAux.push(elemento.idCarrera);
        });
    } else {
        arregloAux = [];
    }
    txtCarrera.value = arregloAux;
}
(function () {
    "use strict";
    let forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

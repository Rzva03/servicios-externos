/* -------------------------------------------------------------------------- */
/*                               Custom Scripts                               */

/* -------------------------------------------------------------------------- */
/*                                  Variables                                 */
/* -------------------------------------------------------------------------- */
//variables que se ocuparan para el siguiente metodo del año
let fechaInicial;
let fechaFinal;
let valorTrimestre;
let valorAnio;
let inputInicial = document.getElementById("txtFechaInicial");
let inputFinal = document.getElementById("txtFechaFinal");
let array = [];
let arregloAux = [];
let txtCarrera = document.getElementById("txtCarreras");
let nodo, nodo2;
/* -------------------------------------------------------------------------- */
function agregarID(idSelector, idInput) {
    let valorSeleccionado = idSelector.value;
    idInput.value = valorSeleccionado;
}
/* -------------------------------------------------------------------------- */
/*                                  busqueda                                  */
/* -------------------------------------------------------------------------- */

function busquedaTabla() {
    // Declare variables
    let input, filter, table, tr, td, i;
    input = document.getElementById("busqueda");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
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
    valorTrimestre = idSelectorTrimestre.value; //se obtiene lo que se selecciona del seclt
    switch (valorTrimestre) {
        case "1":
            fechaInicial = "-01-01";
            fechaFinal = "-03-01";
            break;
        case "2":
            fechaInicial = "-04-01";
            fechaFinal = "-06-01";
            break;
        case "3":
            fechaInicial = "-07-01";
            fechaFinal = "-09-01";
            break;
        case "4":
            fechaInicial = "-10-01";
            fechaFinal = "-12-01";
            break;
    }
    if (valorAnio === undefined) {
        let fechaInicialAux = localStorage.getItem("anio") + fechaInicial;
        let fechaFinalAux = localStorage.getItem("anio") + fechaFinal;
        inputInicial.value = fechaInicialAux; //lo vacia al txt
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
    localStorage.setItem("anio", valorAnio); //se obtiene lo que se selecciona del seclt
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

/* -------------------------------------------------------------------------- */
/*                  Habilitar y Deshabilitar email y telefono                 */
/* -------------------------------------------------------------------------- */
let inlineCheckboxEmail = document.getElementById("inlineCheckboxEmail"),
    inlineCheckboxTel = document.getElementById("inlineCheckboxTel"),
    divEmail = document.getElementById("divEmail"),
    divTelefono = document.getElementById("divTelefono"),
    txtEmail = document.getElementById("txtEmail"),
    txtTelefono = document.getElementById("txtTelefono");
inlineCheckboxEmail.addEventListener("click", (e) => {
    if (inlineCheckboxEmail.checked) {
        txtEmail.required = true;
        divEmail.removeAttribute("hidden");
    } else {
        divEmail.setAttribute("hidden", "");
        txtEmail.removeAttribute("required");
    }
});
inlineCheckboxTel.addEventListener("click", (e) => {
    if (inlineCheckboxTel.checked) {
        //indefinido
        txtTelefono.required = true;
        divTelefono.removeAttribute("hidden");
    } else {
        divTelefono.setAttribute("hidden", "");
        txtTelefono.removeAttribute("required");
    }
});

/* -------------------------------------------------------------------------- */
/*                               Custom Scripts                               */
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
//variables que se ocuparan para el siguiente metodo del año
let fechaInicial;
let fechaFinal;
function convertirFechaPorTrimestre(idSelectorTrimestre) {
    let valorSeleccionado = idSelectorTrimestre.value; //se obtiene lo que se selecciona del seclt
    switch (valorSeleccionado) {
        case "1":
            fechaInicial = "-01-01";
            fechaFinal = "-03-01";
            console.log(fechaInicial, fechaFinal);
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
}
function convertirFechaPorAnio(idSelectorAnio, idInputFI, idInputFC) {
    let valorSeleccionado = idSelectorAnio.value; //se obtiene lo que se selecciona del seclt
    let anioCompletoI = valorSeleccionado + fechaInicial;
    let anioCompletoF = valorSeleccionado + fechaFinal;
    idInputFI.value = anioCompletoI; //lo vacia al txt
    idInputFC.value = anioCompletoF;
}

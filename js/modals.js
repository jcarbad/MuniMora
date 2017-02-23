function mostrarModal(id){
    $("#"+id).modal("show");
}

function ocultarModal(id){
    $("#"+id).modal("hide");
}
//hhhhhhhhhhhhhhhhhhh
function filtrado() {  
// Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("txtBusqueda");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaNotificaciones");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
	var criterio = document.getElementById("criterioBusqueda").value;
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[criterio];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

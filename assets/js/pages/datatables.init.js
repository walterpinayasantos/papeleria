$(document).ready(function() {
    $("#datatable").DataTable({
        keys: !0,
        language: {
            processing: "Procesando...",
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            infoPostFix: "",
            search: "Buscar:",
            url: "",
            infoThousands: ",",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
            aria: {
                sortAscending: ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
});
$(document).ready(function() {
    $('#asistencia').DataTable({
        keys: !0,
        lengthMenu: [2, 4, 8]
    });
    //MUESTRA LA Version DE NUESTRO DataTable (1.10.19)
    //var versionNo = $.fn.dataTable.version;
    //alert(versionNo);
});
$(document).ready(function() {
    $("#proveedor").DataTable({
        keys: !0
    });
});
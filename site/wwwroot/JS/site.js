// site.js
$(document).ready(function() {
    // Inicializa DataTables en la tabla con id 'miTabla' (si existe)
    if ($('#miTabla').length) {
        $('#miTabla').DataTable();
    }
});

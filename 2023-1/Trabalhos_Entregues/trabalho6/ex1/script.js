$(document).ready(function () {
    $('#example').DataTable({
        "paging": true,
        "ordering": true,
        "searching": true
    });

    $("#limparTabela").on("click", function () {

        $('#example').DataTable().clear().draw();

    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#disneyTable').DataTable({
        "paging": false,
        "order": [ 1, 'desc' ]
    });
});

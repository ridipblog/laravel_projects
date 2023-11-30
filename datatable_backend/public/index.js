
$(document).ready(function () {
    $('#myDataTable').DataTable({
        dom: 'Bfrtip', // Show the export buttons
        buttons: [
            'copy', 'excel', 'pdf', 'csv', 'print'
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            type: 'GET',
            url: "/getData",
            data: {
                id: 1
            }
        },
        "columns": [
            { "data": "name" },
            { "data": "depertment" }
            // Add other columns as needed
        ]
    });
});


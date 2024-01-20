$(document).ready(function () {
    console.log("Ok");
    $('#datatable').DataTable({

        processing: true,
        serverSide: true,
        ajax: '/get-data-with-server',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
        ],
        "pagingType": "full_numbers",
        buttons: [
            'copy', 'excel', 'pdf' // Add export buttons
        ]
    });
});

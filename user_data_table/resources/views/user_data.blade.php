<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <title> Table Export</title>
    <style>
        .widthFix {
            background: red;
        }

        .widthFix span {
            color: blue;
        }
    </style>
</head>

<body>
    <table id="users-table" class=" display" style="width: 90%">
        <thead>
            <tr>
                <th>ID </th>
                <th>Employe Code </th>
                <th>Employe Name </th>
            </tr>
        </thead>
        <tbody id="table_body"></tbody>
    </table>
    <button id="show_btn">Show Data</button>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                colReorder: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        className: 'csv_buttonbtn btn-default widthFix',
                        messageTop: 'PDF created by PDFMake with Buttons for DataTables.',
                        init: function(api, node, config) {
                            $(node).removeClass('.dt-button')
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        className: 'pdf_button',
                        messageTop: 'PDF created by PDFMake with Buttons for DataTables.'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy Data',
                        messageTop: 'PDF created by PDFMake with Buttons for DataTables.'
                    },
                ]

            });
            var table = $('#users-table').DataTable();
            var buttonText = table.button(2);
            $(buttonText).on('click', function() {
                console.log("Ok");
            })

            $(document).on('click', '#show_btn', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('export.name') }}",
                    success: function(result) {
                        var dataTable = $('#users-table').DataTable();
                        dataTable.clear().draw();
                        for (var i = 0; i < result.message.length; i++) {
                            dataTable.row.add([result.message[i].id, result.message[i].emp_code,
                                result.message[i].employe_name
                            ]).draw(false);
                        }
                        console.log(result.message);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })
        });
    </script>
</body>

</html>

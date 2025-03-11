<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GRC</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .table th, .table td {
            max-width: 200px;
            min-width: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Applicable</th>
                        <th>Control Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Responsible</th>
                        <th>Approver</th>
                        <th>Deadline</th>
                        <th>Frequency</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Applicable</th>
                        <th>Control Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Responsible</th>
                        <th>Approver</th>
                        <th>Deadline</th>
                        <th>Frequency</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/ellipsis.js"></script>
    <script>
         $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/controls",
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all",
                render: $.fn.dataTable.render.ellipsis(50, true)
            }],
            columns: [
                { data: 'applicable' },
                { data: 'controlId' },
                { data: 'name' },
                { data: 'description' },
                { data: 'status' },
                { data: 'responsible' },
                { data: 'approver' },
                { data: 'deadline' },
                { data: 'frequency' }
            ]
         });
    </script>
</body>
</html>

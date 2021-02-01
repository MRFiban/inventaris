    <div class="container">

        <table id="purchases_table" class="display dataTable table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Pemasok</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Tiba</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>ID Pemasok</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Tiba</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script type="text/javascript">
        var altEditor;
        $(document).ready(function() {
            $(document).foundation();
            var columnDefs = [{
                    data: "id",
                    title: "ID",
                    type: "readonly"
                },
                {
                    data: "supplier_id",
                    title: "ID Pemasok"
                },
                {
                    data: "item_id",
                    title: "ID Barang"
                },
                {
                    data: "amount",
                    title: "Jumlah"
                },
                {
                    data: "order_date",
                    title: "Tanggal Pesan",
                    type: "date"
                },
                {
                    data: "date_arrived",
                    title: "Tanggal Tiba",
                    type: "date"
                }
            ];
            var myTable = $('#purchases_table').DataTable({
                ajax: {
                    url: '../inventory/readPurchases',
                    // our data is an array of objects, in the root node instead of /data node, so we need 'dataSrc' parameter
                    dataSrc: ''
                },
                paging: true,
                pagingType: "full_numbers",
                ordering: true,
                info: true,
                order: [
                    [0, "asc"]
                ],
                scrollX: false,
                columns: columnDefs,
                dom: 'BSRlfrtip', // Needs button container
                select: 'single',
                responsive: true,
                altEditor: true, // Enable altEditor
                buttons: [{
                        text: 'Add',
                        name: 'add' // do not change name
                    },

                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Edit',
                        name: 'edit' // do not change name
                    },

                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Delete',
                        name: 'delete' // do not change name
                    }, 'copy', 'excel', 'pdf'
                ],
                onAddRow: function(datatable, rowdata, success, error) {
                    $.ajax({
                        // a tipycal url would be / with type='PUT'
                        url: '../inventory/createPurchases',
                        type: 'POST',
                        dataType: "JSON",
                        data: rowdata,
                        success: success,
                        error: error
                    });
                },
                onDeleteRow: function(datatable, rowdata, success, error) {
                    $.ajax({
                        // a tipycal url would be /{id} with type='DELETE'
                        url: '../inventory/deletePurchases',
                        type: 'POST',
                        dataType: "JSON",
                        data: rowdata,
                        success: success,
                        error: error
                    });
                },
                onEditRow: function(datatable, rowdata, success, error) {
                    $.ajax({
                        // a tipycal url would be /{id} with type='POST'
                        url: '../inventory/updatePurchases',
                        type: 'POST',
                        dataType: "JSON",
                        data: rowdata,
                        success: success,
                        error: error

                    });
                }

            });

        });
    </script>
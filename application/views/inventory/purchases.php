        <div class="container-fluid">
            <caption style="caption-side:top">Tabel Barang Masuk</caption>
            <table id="purchases_table" class="display nowrap compact cell-border table-bordered">
            </table>
            <br>
            <caption style="caption-side:top">Tabel Pemasok</caption>
            <table id="suppliers_table" class="display nowrap compact cell-border table-bordered">
            </table>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                var supplierID = [];
                var supplierName = [];
                var supplierList;
                var itemID = [];
                var itemName = [];
                var supplierList;
                var now = new Date();

                var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"
                ];
                var tanggal = now.getDate() + '-' + months[now.getMonth()] + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + now.getMinutes();
                var actor = "<?php echo $_SESSION['real_name']; ?>";


                $.ajax({
                    type: "GET",
                    url: "../inventory/readSuppliersList",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        supplierList = $.map(data, function(obj) {
                            return obj;
                        });
                        supplierList.forEach(myFunction);

                        function myFunction(item) {
                            supplierID.push(item.id);
                            supplierName.push(item.text);
                        }
                    },
                    error: function(e) {
                        alert("Can't load models.");
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "../inventory/readItemsList",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        itemList = $.map(data, function(obj) {
                            return obj;
                        });
                        itemList.forEach(myFunction);

                        function myFunction(item) {
                            itemID.push(item.id);
                            itemName.push(item.text);
                        }
                    },
                    error: function(e) {
                        alert("Can't load models.");
                    }
                });
                var columnDefs = [{
                        data: "purchase_id",
                        title: "ID",
                        type: "natural",
                        disabled: true,
                        render: function(data, type, row, meta) {
                            return 'IN-' + row['purchase_id'];
                        }
                    },
                    {
                        data: "supplier_id",
                        title: "ID Pemasok",
                        type: "readonly hidden",
                        visible: false
                    },
                    {
                        data: "supplier_name",
                        title: "Nama Pemasok",
                        type: "select",
                        editorOnChange: function(event, altEditor) {
                            var valueId = document.getElementById("supplier_name").value;
                            var arrIndex = supplierName.indexOf(valueId);
                            $("#supplier_id").val(supplierID[arrIndex]).trigger("change");
                        },
                        select2: {
                            width: '100%',
                            data: supplierName,
                            placeholder: "Pilih sumber atau pemasok",
                        },
                    },
                    {
                        data: "item_id",
                        title: "ID Barang",
                        type: "readonly  hidden",
                        visible: false
                    },
                    {
                        data: "item_name",
                        title: "Nama Barang",
                        type: "select",
                        editorOnChange: function(event, altEditor) {
                            var valueId = document.getElementById("item_name").value;
                            var arrIndex = itemName.indexOf(valueId);
                            $("#item_id").val(itemID[arrIndex]).trigger("change");
                        },
                        select2: {
                            width: '100%',
                            placeholder: "Pilih barang yang dipesan",
                            data: itemName,
                        }
                    },
                    {
                        data: "purchase_amount",
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

                    order: [
                        [0, 'desc']
                    ],
                    pagingType: "full_numbers",
                    columns: columnDefs,
                    // dom: 'SRBlfrtip', // Needs button container
                    dom: "SR" +
                        // "<'row align-items-center'<'col-sm-12 col-md-3'l> <'col-sm-12 col-md-6'B> <'col-sm-12 col-md-3'f>>" +
                        "<'row no-gutters align-items-end' <'col-sm-12 col-md-4 align-self-end'B><'notes col-sm-12 col-md-4 align-self-end'><'col-sm col-md-4 align-self-end'f>>" +
                        "<'row'<'col-sm-12'tr>>Q",
                    // "<'row'<'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
                    select: 'single',
                    scrollY: 300,
                    // scrollX: true,
                    deferRender: true,
                    scroller: true,
                    responsive: true,
                    altEditor: getPermission(), // Enable altEditor
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
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Export',
                            exportOptions: {
                                columns: [0, 2, 4, 5, 6, 7],
                            },
                            title: "Laporan Pemasukan Barang Proyek",
                            orientation: "portrait",
                            download: "open",
                            customize: function(doc) {
                                var colCount = new Array();
                                $(purchases_table).find('tbody tr:first-child td').each(function() {
                                    if ($(this).attr('colspan')) {
                                        for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                            colCount.push('*');
                                        }
                                    } else {
                                        colCount.push('*');
                                    }
                                });
                                doc.content[1].table.widths = ['8%', '30%', '30%', '8%', '12%', '12%'];
                                doc.content.splice(1, 0, {
                                    text: 'Tanggal: ' + tanggal + '\t' +
                                        'Penanggung jawab: ' + actor + '\t' +
                                        'Catatan: ' + catatan.value + '\t',
                                    alignment: 'center',
                                    text: 'Tanggal: ' + tanggal + '\n' +
                                        actor + '\n' +
                                        'Catatan: ' + catatan.value + '\t',
                                    alignment: 'left',

                                    margin: [5, 2]
                                });
                            }
                        }, 'colvis'
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
                $("div.notes").html('<div><input class="form-control" type="text" id="notes" placeholder="Catatan laporan"></div>');
                catatan = document.getElementById("notes");

                var columnDefs2 = [{
                        data: "supplier_id",
                        title: "ID",
                    },
                    {
                        data: "supplier_name",
                        title: "Nama Pemasok"
                    },
                    {
                        data: "supplier_address",
                        title: "Alamat"
                    },
                    {
                        data: "contact_num",
                        title: "No. Kontak"
                    }
                ];
                var myTable2 = $('#suppliers_table').DataTable({
                    ajax: {
                        url: '../inventory/readSuppliers',
                        // our data is an array of objects, in the root node instead of /data node, so we need 'dataSrc' parameter
                        dataSrc: ''
                    },
                    pagingType: "full_numbers",
                    columns: columnDefs2,
                    // dom: 'SRBlfrtip', // Needs button container
                    dom: "SR" +
                        // "<'row align-items-center'<'col-sm-12 col-md-3'l> <'col-sm-12 col-md-6'B> <'col-sm-12 col-md-3'f>>" +
                        "<'row no-gutters align-items-end' <'col-sm-12 col-md-6 align-self-end'B> <'col-sm col-md-6 align-self-end'f>>" +
                        "<'row'<'col-sm-12'tr>>Q",
                    // "<'row'<'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
                    select: 'single',
                    scrollY: 400,
                    // scrollX: true,
                    deferRender: true,
                    scroller: true,
                    responsive: true,
                    order: [
                        [0, 'desc']
                    ],
                    altEditor: getPermission(), // Enable altEditor
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
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Export',
                            exportOptions: {
                                columns: [0, 1, 2, 3],
                            },
                            title: "Laporan Daftar Pemasok",
                            orientation: "portrait",
                            download: "open",
                            customize: function(doc) {
                                console.log(doc.content)
                                var colCount = new Array();
                                $(suppliers_table).find('tbody tr:first-child td').each(function() {
                                    if ($(this).attr('colspan')) {
                                        for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                            colCount.push('*');
                                        }
                                    } else {
                                        colCount.push('*');
                                    }
                                });
                                doc.content[1].table.widths = ['8%', '32%', '40%', '20%'];
                                doc.content.splice(1, 0, {
                                    text: 'Tanggal: ' + tanggal + '\n' + actor + '\n',
                                    alignment: 'left',

                                    margin: [5, 2]
                                });
                            }
                        }, 'colvis'
                    ],
                    onAddRow: function(datatable, rowdata, success, error) {
                        $.ajax({
                            // a tipycal url would be / with type='PUT'
                            url: '../inventory/createSuppliers',
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
                            url: '../inventory/deleteSuppliers',
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
                            url: '../inventory/updateSuppliers',
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
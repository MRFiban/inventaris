        <div class="container-fluid">
            <table id="items_table" width="100%" class="display nowrap compact cell-border table-bordered">
            </table>

        </div>

        <script type="text/javascript">
            var warehouseID = [];
            var warehouseName = [];
            var warehouseList;
            $(document).ready(function() {

                var now = new Date();
                var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"
                ];
                var tanggal = now.getDate() + '-' + months[now.getMonth()] + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + now.getMinutes();
                console.log(tanggal);
                var actor = "<?php echo $_SESSION['real_name']; ?>";
                var catatan;


                $.ajax({
                    type: "GET",
                    url: "../inventory/readWarehouseList",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        warehouseList = $.map(data, function(obj) {
                            return obj;
                        });
                        warehouseList.forEach(myFunction);

                        function myFunction(item) {
                            warehouseID.push(item.id);
                            warehouseName.push(item.text);
                        }
                    },
                    error: function(e) {
                        alert("Can't load models.");
                    }
                });
                var columnDefs = [{
                        data: "item_id",
                        title: "ID",
                        type: "natural",
                        render: function(data, type, row, meta) {
                            return 'ITM-' + row['item_id'];
                        }
                        // type: "readonly"
                    },
                    {
                        data: "item_name",
                        title: "Nama Barang",
                        placeholder: "Cat Tembok Avitex Silk Knot",
                    }, {
                        data: "item_brand",
                        title: "Merk",
                        placeholder: "Avitex",

                    }, {
                        data: "item_model",
                        title: "Model",
                        placeholder: "Avitex Interior",
                    },
                    {
                        data: "item_size",
                        title: "Ukuran"
                    }, {
                        data: "item_amount",
                        title: "Jumlah",
                        type: "num",

                    }, {
                        data: "item_availability",
                        type: "num",
                        title: "Persediaan"

                    }, {
                        data: "item_description",
                        title: "Deskripsi"
                    }, {
                        data: "warehouse_section",
                        title: "AREA GUDANG",
                        type: "readonly  hidden",
                        visible: false
                    }, {
                        data: "iwarehouse_id",
                        title: "Area Gudang",
                        type: "select",
                        // editorOnChange: function(event, altEditor) {
                        //     var valueId = document.getElementById("supplier_name").value;
                        //     var arrIndex = supplierName.indexOf(valueId);
                        //     $("#supplier_id").val(supplierID[arrIndex]).trigger("change");
                        // },
                        select2: {
                            width: '100%',
                            data: warehouseList,
                            placeholder: "Pilih lokasi penyimpanan",
                        },
                        render: function(data, type, row) {
                            return row['warehouse_section'];
                        },
                    }
                ];

                var myTable = $('#items_table').DataTable({
                    ajax: {
                        url: '../inventory/readItems',
                        // our data is an array of objects, in the root node instead of /data node, so we need 'dataSrc' parameter
                        dataSrc: ''
                    },
                    // pagingType: "full_numbers",
                    columns: columnDefs,
                    // dom: 'SRBlfrtip', // Needs button container
                    dom: "SR" +
                        // "<'row align-items-center'<'col-sm-12 col-md-3'l> <'col-sm-12 col-md-6'B> <'col-sm-12 col-md-3'f>>" +
                        "<'row no-gutters align-items-end' <'col-sm-12 col-md-6 align-self-end'B> <'col-sm col-md-6 align-self-end'f>>" +
                        "<'row'<'col-sm-12'tr>>Q",
                    // "<'row'<'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
                    select: 'single',
                    scrollY: 400,
                    scrollX: true,
                    // deferRender: true,
                    scroller: true,
                    responsive: true,
                    order: [
                        [0, 'desc']
                    ],
                    altEditor: getPermission(), // Enable altEditor
                    buttons: [{
                            text: 'Add Item',
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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 9],
                            },
                            title: "Laporan Inventaris Barang Proyek",
                            orientation: "landscape",
                            download: "open",
                            customize: function(doc) {
                                console.log(doc.content)
                                // doc.content[1].table.widths = ['2%', '14%', '14%', '14%',
                                //     '14%', '14%', '14%', '14%'
                                // ];

                                doc.content.splice(1, 0, {
                                    text: 'Tanggal: ' + tanggal + '\n' + actor + '\n',
                                    alignment: 'left',
                                    margin: [5, 2]
                                });
                                doc.content.splice(3, 0, {
                                    // text: '\n\n\n\n\nTanggal: ' + tanggal + '\n\n\n\n\n' + actor + '\n',
                                    // alignment: 'left',

                                    // margin: [5, 2]
                                    columns: [{
                                            alignment: 'center',
                                            text: '\n\nMengetahui,\nKepala Proyek' + '\n\n\n\n\n' + actor + '\n',
                                        },
                                        {},
                                        {},
                                        {
                                            alignment: 'center',
                                            text: '\n\nBandung, ' + tanggal + '\n\n\n\n\n' + actor + '\n',

                                        }
                                    ]
                                });
                            }
                        },
                        'csv',
                        'colvis'
                    ],
                    language: {
                        searchBuilder: {
                            button: 'Cari Data'
                        }
                    },
                    "searchBuilder": {
                        // columns: [0, 2, 3],
                        // button: 'Filter',
                    },
                    rowCallback: function(row, data) {
                        if (parseInt(data.item_amount) > parseInt(data.item_availability)) {
                            $(row).addClass('bg-warning');
                        } else
                            $(row).removeClass('bg-warning');

                    },
                    onAddRow: function(datatable, rowdata, success, error) {
                        $.ajax({
                            // a tipycal url would be / with type='PUT'
                            url: '../inventory/createItems',
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
                            url: '../inventory/deleteItems',
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
                            url: '../inventory/updateItems',
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
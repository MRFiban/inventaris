        <div class="container-fluid">
            <caption>Tabel Kebutuhan Proyek</caption>
            <table id="needs_table" class="display nowrap compact cell-border table-bordered"></table>
            <br>
            <caption>Tabel Proyek</caption>
            <table id="projects_table" class="display nowrap compact cell-border table-bordered"></table>
        </div>

        <script type="text/javascript">
            var now = new Date();
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober", "November", "Desember"
            ];
            var tanggal = now.getDate() + '-' + months[now.getMonth()] + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + now.getMinutes();
            console.log(tanggal);
            var actor = "<?php echo $_SESSION['real_name']; ?>";
            var catatan;
            $(document).ready(function() {
                var projectID = [];
                var projectName = [];
                var projectList;
                var itemID = [];
                var itemName = [];
                var ItemList;

                $.ajax({
                    type: "GET",
                    url: "../inventory/readProjectsList",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        projectList = $.map(data, function(obj) {
                            return obj;
                        });
                        projectList.forEach(myFunction);

                        function myFunction(item) {
                            projectID.push(item.id);
                            projectName.push(item.text);
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
                        data: "project_id",
                        title: "ID",
                        type: "natural",
                        disabled: true,
                        render: function(data, type, row, meta) {
                            return 'P-' + row['project_id'];
                        }
                        // type: "readonly"
                    },
                    {
                        data: "project_name",
                        title: "Nama Proyek",
                    }
                ];
                var myTable = $('#projects_table').DataTable({
                    ajax: {
                        url: '../inventory/readProjects',
                        // our data is an array of objects, in the root node instead of /data node, so we need 'dataSrc' parameter
                        dataSrc: ''
                    },
                    pagingType: "full_numbers",
                    columns: columnDefs,
                    // dom: 'SRBlfrtip', // Needs button container
                    dom: "SR" +
                        // "<'row align-items-center'<'col-sm-12 col-md-3'l> <'col-sm-12 col-md-6'B> <'col-sm-12 col-md-3'f>>" +
                        "<'row no-gutters align-items-end' <'col-sm-12 col-md-6 align-self-end'B> <'col-sm col-md-6 align-self-end'f>>" +
                        "<'row'<'col-sm-12'tr>>Q",
                    // "<'row'<'col-sm-12 col-md-5'i> <'col-sm-12 col-md-7'p>>",
                    select: 'single',
                    scrollY: 250,
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
                                columns: [0, 1],
                            },
                            title: "Laporan Daftar Proyek",
                            orientation: "portrait",
                            download: "open",
                            customize: function(doc) {
                                console.log(doc.content)

                                var colCount = new Array();
                                $(projects_table).find('tbody tr:first-child td').each(function() {
                                    if ($(this).attr('colspan')) {
                                        for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                            colCount.push('*');
                                        }
                                    } else {
                                        colCount.push('*');
                                    }
                                });
                                doc.content[1].table.widths = ['10%', '90%'];
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
                            url: '../inventory/createProjects',
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
                            url: '../inventory/deleteProjects',
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
                            url: '../inventory/updateProjects',
                            type: 'POST',
                            dataType: "JSON",
                            data: rowdata,
                            success: success,
                            error: error
                        });
                    }
                });
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                var columnDefs2 = [{
                        data: "need_id",
                        title: "ID",
                        type: "natural",
                        disabled: true,
                        render: function(data, type, row, meta) {
                            return 'P' + row['project_id'] + '-' + row['need_id'];
                        }
                    },
                    {
                        data: "project_id",
                        title: "ID Proyek",
                        type: "readonly  hidden",
                        visible: false
                    },
                    {
                        data: "project_name",
                        title: "Nama Proyek",
                        type: "select",
                        editorOnChange: function(event, altEditor) {
                            var valueId = document.getElementById("project_name").value;
                            var arrIndex = projectName.indexOf(valueId);
                            $("#project_id").val(projectID[arrIndex]).trigger("change");
                        },
                        select2: {
                            width: '100%',
                            data: projectName,
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
                            data: itemName,
                            placeholder: "Pilih sumber atau pemasok",
                        },
                    },
                    {
                        data: "amount",
                        title: "Jumlah"
                    },
                    {
                        data: "item_amount",
                        title: "Jumlah Stok",
                        type: "num",
                        disabled: true,
                        // visible: false
                    }
                ];
                var myTable2 = $('#needs_table').DataTable({
                    ajax: {
                        url: '../inventory/readNeeds',
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
                    scrollY: 250,
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
                                columns: [0, 2, 4, 5, 6],
                            },
                            title: "Laporan Rincian Kebutuhan Barang Proyek",
                            orientation: "portrait",
                            download: "open",
                            customize: function(doc) {
                                console.log(doc.content)

                                var colCount = new Array();
                                $(needs_table).find('tbody tr:first-child td').each(function() {
                                    if ($(this).attr('colspan')) {
                                        for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                            colCount.push('*');
                                        }
                                    } else {
                                        colCount.push('*');
                                    }
                                });
                                doc.content[1].table.widths = ['7%', '50%', '25%', '9%', '9%'];

                                doc.content.splice(1, 0, {
                                    text: 'Tanggal: ' + tanggal + '\n' + actor + '\n',
                                    alignment: 'left',
                                    margin: [5, 2]
                                });
                            }
                        }, 'csv', 'colvis'
                    ],
                    onAddRow: function(datatable, rowdata, success, error) {
                        $.ajax({
                            // a tipycal url would be / with type='PUT'
                            url: '../inventory/createNeeds',
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
                            url: '../inventory/deleteNeeds',
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
                            url: '../inventory/updateNeeds',
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
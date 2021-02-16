      <div class="container-fluid">
          <table id="warehouse_table" class="display nowrap compact cell-border table-bordered"></table>
      </div>

      <script type="text/javascript">
          $(document).ready(function() {
              var now = new Date();
              var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                  "Agustus", "September", "Oktober", "November", "Desember"
              ];
              var tanggal = now.getDate() + '-' + months[now.getMonth()] + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + now.getMinutes();
              console.log(tanggal);
              var actor = "<?php echo $_SESSION['real_name']; ?>";
              var catatan;
              var columnDefs = [{
                      data: "warehouse_id",
                      title: "ID",
                      type: "natural",
                      disabled: true,
                      //   type: "readonly"
                  },
                  {
                      data: "warehouse_section",
                      title: "Bagian Gudang",
                  },
                  {
                      data: "description",
                      title: "Deskripsi"
                  },
                  {
                      data: "capacity",
                      title: "Kapasitas (%)"
                  }
              ];
              var myTable = $('#warehouse_table').DataTable({
                  ajax: {
                      url: '../inventory/readWarehouse',
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
                          title: "Laporan Status Area Gudang",
                          orientation: "portrait",
                          download: "open",
                          customize: function(doc) {
                              console.log(doc.content)
                              var colCount = new Array();
                              $(warehouse_table).find('tbody tr:first-child td').each(function() {
                                  if ($(this).attr('colspan')) {
                                      for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                          colCount.push('*');
                                      }
                                  } else {
                                      colCount.push('*');
                                  }
                              });
                              doc.content[1].table.widths = ['5%', '15%', '70%', '10%'];
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
                          url: '../inventory/createWarehouse',
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
                          url: '../inventory/deleteWarehouse',
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
                          url: '../inventory/updateWarehouse',
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
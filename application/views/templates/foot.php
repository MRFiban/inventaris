<footer class="container-fluid text-center label secondary float-center margin-bottom-0">
  <label>Hak Cipta &copy; 2019-2020
    <br>Muhamad Ridwan Fathoni<br>
    <a href="<?php echo base_url(); ?>">PT. Global Mekar Mandiri</a>
  </label>

</footer>

<script>
  $(function() {
    $(document).foundation();
    $('#inventory_table').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "order": [
        [0, "asc"]
      ],
      "scrollX": true,
      dom: 'B<"clear">lfrtip',
      buttons: [
        'copy', 'excel', 'pdf'
      ]
    });
  });
</script>

</body>

</html>
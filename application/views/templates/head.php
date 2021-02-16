<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Inventaris - <?php echo $title; ?></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/datatables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/dist/css/select2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- <link rel="font/ttf" href="<?php echo base_url(); ?>assets/fonts/Ubuntu-Regular.ttf"> -->
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/datatables/datatables.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/select2/dist/js/select2.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/js/dataTables.altEditor.free.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/js/natural.js"></script>
  <script type="text/javascript" charset="utf8">
    function getPermission() {
      var role = "<?php echo $_SESSION['role']; ?>";
      var uri = "<?php echo $this->uri->segment(2); ?>";
      if (role == "bagian_gudang" && (uri == "warehouse" || uri == "consumption")) {
        return true
      } else
      if (role == "bagian_pengadaan" && (uri == "inventory" || uri == "purchases")) {
        return true
      } else
      if (role == "bagian_inventaris") {
        return true
      } else
        return false; //FALSE
    };
  </script>
</head>

<body class="d-flex flex-column min-vh-100">
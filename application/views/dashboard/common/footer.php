<script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!--<script src="<?php echo base_url()."assets/"; ?>plugins/morris/morris.min.js"></script> -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/app.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
</body>
</html>
<script src="<?php echo base_url()."assets/"; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!--<script src="<?php echo base_url()."assets/"; ?>plugins/morris/morris.min.js"></script> -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/app.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4IbxXuCtXNHU5LJuVOj8hHFi43ezq2j9";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
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
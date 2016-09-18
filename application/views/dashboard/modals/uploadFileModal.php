<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/uploadify.css" />
<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload File</h4>
      </div>
      <div class="modal-body">
          <div id="upload-alert-msg"></div>
          <div class="uploadify-queue" id="file-queue"></div>
          <input type="hidden" name="uploadclassid" id="uploadclassid" value="" />
          <input type="file" name="userfile" id="userfile" class='btn btn-primary' />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadify.min.js"></script>
<script type='text/javascript' >
   function setUploadClassId(classid){ 
      $("#uploadclassid").val(classid);
    }
    
    $(function() {

     $('#userfile').uploadify({
      'debug'   : false,
      'swf'   : '<?php echo base_url() ?>assets/js/uploadify.swf',
      'uploader'  : "<?php echo site_url('modules/uploadfile/'); ?>",
      'cancelImage' : '<?php echo base_url() ?>assets/js/lib/uploadify-cancel.png',
      'queueID'  : 'file-queue',
      'buttonClass'  : 'button',
      'buttonText' : "Upload Files",
      'multi'   : true,
      'auto'   : true,
      'fileTypeExts' : '*.jpeg; *.jpg; *.doc; *.docx; *.pdf; *.xls; *.xlsx; *.ppt; *.png; *.JPEG; *.JPG; *.DOC; *.DOCX; *.PDF; *.XLS; *.XLSX; *.PPT; *.PNG',
      'fileTypeDesc' : 'Image Files',
      'method'  : 'post',
      'fileObjName' : 'userfile',
      'queueSizeLimit': 40,
      'simUploadLimit': 2,
      'fileSizeLimit'  : '2048KB',
      'onUploadStart': function (file) {
                var formData = {'classId' : $("#uploadclassid").val(), 'type' : 'CLASS'};
                $('#userfile').uploadify("settings", "formData", formData);
      },
      'onUploadSuccess' : function(file, data, response) {
          // $("#upload-alert-msg").html(data);
       },
       'onUploadComplete' : function(file) {
            // alert('The file ' + file.name + ' finished processing.');
       },
        'onQueueFull': function(event, queueSizeLimit) {
            alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
            return false;
        },
        });

     });
    </script>
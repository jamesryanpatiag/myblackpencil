<div class="modal fade" id="notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Notes</h4>
      </div>
      <div class="modal-body" id="notes">

          <div id="form_container">
            
            <div class="box box-success" id="box-notes-modal">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title"></h3>

              </div>
              <input type="hidden" id="notesClassId" />
              <div class="box-body chat" id="notes-chat-box">
                <!-- chat item -->
                
              </div>
              <div class="box-footer">
                <div class="input-group">
                  <div class="input-group-btn">
                    <a href='#' class='btn btn-primary' id="btn_attach_file" title='Attach a file'><span class='fa fa-paperclip'></span></a>
                  </div>
                  <div style="display:none">
                      <input type="file" id="notesUploadFile" name="notesUploadFile" />
                  </div>
                  <input type="text" class="form-control" placeholder="Type message..." id="noteMessage">
                  <div class="input-group-btn">
                    <button type="button" id="submitAddNotes" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <br/>
                <div class="callout callout-info" id="uploadedFileCallOut" style="display:none">
                  <p id="uploadedFilename"></p>
                </div>
              </div>
              <div id="notes-alert-msg"></div>
          </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<style type="text/css">

  /* Important part */
  .modal-dialog{
      overflow-y: initial !important
  }
  #notes-chat-box{
      padding-top:20px;
      height: 350px;
      overflow-y: auto;
  }
</style>
<script>

  $(function(){
    
      $("#btn_attach_file").on('click', function(){
        $("#notesUploadFile").trigger('click');    
      })

     $('#notesUploadFile').change(function(e){
          var fileName = e.target.files[0].name;

          $("#uploadedFileCallOut").css("display", "none");
          $("#uploadedFilename").html("");

          if(fileName!=""){
              $("#uploadedFileCallOut").css("display", "block");
              $("#uploadedFilename").html("<strong>This file is ready to be uploaded:</strong><br/> " + fileName);
          }
          
      });

  })

</script>
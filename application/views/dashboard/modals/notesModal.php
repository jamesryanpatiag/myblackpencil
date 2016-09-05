<div class="modal fade" id="notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Notes</h4>
      </div>
      <div class="modal-body" id="notes">

          <div id="form_container">
          <?php echo validation_errors(); ?>
          <?php echo form_open('modules/addNotes'); ?>
            
            <div class="box box-success" id="box-notes-modal">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title"></h3>

              </div>
              <div class="box-body chat" id="notes-chat-box">
                <!-- chat item -->
                <input type="hidden" id="notesClassId" />
              </div>
              <div class="box-footer">
                <div class="input-group">
                  <div class="input-group-btn">
                    <a href='#' class='btn btn-primary' id="btn_attach_file" title='Attach a file'><span class='fa fa-paperclip'></span></a>
                  </div>
                  <input type="text=" class="form-control" placeholder="Type message..." id="noteMessage">
                  <div class="input-group-btn">
                    <button type="submit" id="submitAddNotes" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
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
<div class="modal fade" id="refundClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Refund/Cancel Class</h4>
      </div>
      <div class="modal-body">
          <?php echo validation_errors(); ?>
          <?php echo form_open('modules/refundClass'); ?>
          <div id="form_container">
            <div class="box-body">
               	<div id="refund-alert-msg"></div>
                <div class="form-group">
                  <label for="refundMessage">Reason:</label>
                  <input type="hidden" id="refundClassId" />
                  <textarea class="form-control" id="refundMessage" rows="3" ></textarea>
                </div>
          	</div>
          </div>
      </div>
      <div class="modal-footer">
      	<input type="button" id="submitRefundClass" value="Submit" class="btn btn-primary" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
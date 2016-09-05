<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Status</h4>
      </div>
      <div class="modal-body">

          <div id="form_container">
          <?php echo validation_errors(); ?>
          <?php echo form_open('modules/changeStatus'); ?>
            <div class="box-body">
               	<div id="status-alert-msg"></div>
	                <div class="form-group">
                    <input type="hidden" id="classId" />
	                  <label for="status">Level</label>
	                  <select  class="form-control pull-right" id="cmbChangeStatus">
	                  	  <option value="">-- Select Status --</option>
	                  	  <?php foreach(getStatus() as $key => $value){ ?>
	                  	  		<option value="<?php echo $key; ?>"><?php echo $value;?></option>
	                  	  <?php } ?>
	                  </select>
	                </div>
              	</div>

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="button" id="submitChangeStatus" value="Submit" class="btn btn-primary" />
      </div>
    </div>
  </div>
</div>
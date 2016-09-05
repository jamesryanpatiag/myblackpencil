<div class="modal fade" id="assignTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Assign Tutor</h4>
      </div>
      <div class="modal-body">

          <div id="form_container">
          <?php echo validation_errors(); ?>
          <?php echo form_open('modules/assignTutor'); ?>
            <div class="box-body">
               	<div id="tutor-alert-msg"></div>
	                <div class="form-group">
                    <input type="hidden" id="tutorClassId" />
	                  <label for="status">Level</label>
	                  <select  class="form-control pull-right" id="cmbAssignTutor">
	                  	  <option value="">-- Select Tutor --</option>
	                  	  <?php foreach($tutors as $tutor){ ?>
	                  	  		<option value="<?php echo $tutor->id; ?>">
                                <?php echo $tutor->username . " - " . $tutor->firstname . " " . 
                                           ($tutor->middlename==""?"":$tutor->middlename . " ") .
                                             $tutor->surname;?>
                            </option>
	                  	  <?php } ?>
	                  </select>
	                </div>
              	</div>

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="button" id="submitAssignTutor" value="Submit" class="btn btn-primary" />
      </div>
    </div>
  </div>
</div>
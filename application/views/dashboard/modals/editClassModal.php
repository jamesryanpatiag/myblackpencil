<div class="modal fade" id="editClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit existing Class</h4>
      </div>
      <div class="modal-body">

          <div id="form_container">
          <?php echo validation_errors(); ?>
          <?php echo form_open('modules/editClass'); ?>
            <div class="box-body">
               <div id="edit-alert-msg"></div>

               <div class="form-group col-md-6 col-lg-6">
                  <label for="type">Type</label>
                  <select  class="form-control pull-right" id="edit_type">
                      <option value="">-- Select Level --</option>
                      <option value="ONLINE-CLASS">Online Class</option>
                      <option value="ONLINE-QUIZ">Online Quiz</option>
                      <option value="ONLINE-EXAM">Online Exam</option>  
                      <option value="ESSAY-PAPER">Essay Paper</option>
                      <option value="PROJECT">Project</option>
                  </select>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="student_level">Level</label>
                  <select  class="form-control pull-right" id="edit_student_level">
                      <option value="">-- Select Level --</option>
                      <option value="HIGH_SCHOOL">High School</option>
                      <option value="UNDERGRADUATE">Undergraduate</option>
                      <option value="GRADUATE">Graduate</option> 
                  </select>
                </div>

                <div class="form-group col-md-6 col-lg-6">
                  <label for="student_url">URL</label>
                  <input type="hidden" class="form-control" id="edit_id">
                  <input type="text" class="form-control" id="edit_student_url" placeholder="Enter School's URL">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="student_username">Username</label>
                  <input type="text" class="form-control" id="edit_student_username" placeholder="Enter Username">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="student_password">Password</label>
                  <input type="text" class="form-control" id="edit_student_password" placeholder="Enter Password">
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="student_course">Course</label>
                  <input type="text" class="form-control" id="edit_student_course" placeholder="Enter Course">
                </div>
                <div class="form-group col-md-12 col-lg-12">
                  <label for="student_description">Description</label>
                  <textarea type="text" class="form-control" id="edit_student_description" placeholder="Enter Description"></textarea>
                </div>                
                <div class="form-group col-md-6 col-lg-6">
                  <label for="edit_start_dtpicker">Start Date</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="edit_start_dtpicker">
                  </div>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  <label for="edit_end_dtpicker">End Date</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="edit_end_dtpicker">
                  </div>
                </div>
              </div>

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="button" id="submitEditClass" value="Submit" class="btn btn-primary" />
      </div>
    </div>
  </div>
</div>
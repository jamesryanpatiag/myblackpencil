<div class="modal fade" id="forceChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
          <div id="form_container">
          <?php echo form_open('modules/editClass'); ?>
            <div class="box-body">
               <div id="edit-alert-msg"></div>

                <div class="form-group col-md-12 col-lg-12">
                  <label for="new_password">New Password</label>
                  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                </div>
                <div class="form-group col-md-12 col-lg-12">
                  <label for="retype_password">Re-Type Password</label>
                  <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype-Password">
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="button" id="submitForceChangePassword" value="Submit" class="btn btn-primary" />
        <button type="button" id="forceChangePasswordCloseBtn" style="display:none" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


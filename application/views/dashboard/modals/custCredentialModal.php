<div class="modal fade" id="customerCredentials" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Student's School Credentials</h4>
      </div>
      <div class="modal-body">

          <div id="form_container">
            <div class="box-body">
               	<div id="cust-alert-msg"></div>
                <div class="form-group">
                  <label for="studentUrl">URL</label>
                  <input type="hidden" id="studentClassId" />
                  <input type="text" class="form-control" id="studentUrl" readonly >
                </div>
                <div class="form-group">
                  <label for="studentUsername">Username</label>
                  <input type="text" class="form-control" id="studentUsername" readonly >
                </div>
                <div class="form-group">
                  <label for="studentPassword">Password</label>
                  <input type="text" class="form-control" id="studentPassword" readonly >
                </div>
                  <!-- UPLOADED FILES -->
                    <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Uploaded Files</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered" id="table_class_uploaded">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>File</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
          	</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
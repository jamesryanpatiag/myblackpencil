<script type="text/javascript">

  function setData(value, status){
      $("#cmbChangeStatus").val(status);
      $("#classId").val(value);
  }

  function setTutorData(classid, tutorid){
      $('#tutorClassId').val(classid);
      $('#cmbAssignTutor').val(tutorid);
  }

  function setNotesData(classid){
      $('#notesClassId').val(classid);
      $('#uploadedFileCallOut').hide();
      $('#notesUploadFile').val('');
      setChatNotes(classid);
  }

  function setStudentCredData(classid){
      $('#studentClassId').val(classid);
      setStudentCredential(classid);
  }

  function setRefundClassData(classid){
      $('#refundClassId').val(classid);
  }

  function getRefundClassData(classid){
      $('#refundClassId').val(classid);
      $("#submitRefundClass").hide();
      $("textarea#refundMessage").prop('disabled', true);
      getRefundClassDataById(classid);
  }

  function setChatNotes(classid){
      $.ajax({
          url: "<?php echo site_url('modules/getNotes/'); ?>" + classid,
          type: 'GET',
          success: function(result) {
            var tableData = JSON.parse(result);
            var html = "";
            $.each(tableData, function(){
                html += createHtmlChatLine(this); 
            });
            $("#notes-chat-box").html("");
            $("#notes-chat-box").append(html);
          }
      });
  }

  function getRefundClassDataById(classid){
      $.ajax({
          url: "<?php echo site_url('modules/getRefundDataByClassId/'); ?>" + classid,
          type: 'GET',
          success: function(result) {
            var refundData = JSON.parse(result)[0];
            $("textarea#refundMessage").val(refundData.message);
          }
      });
  }

  function setStudentCredential(classid){
      $.ajax({
            url: "<?php echo site_url('modules/getStudentInfo/'); ?>" + classid,
            type: 'GET',
            success: function(result) {
              var studentData = JSON.parse(result);
              $('#studentUrl').val(studentData["class"][0]["url"]);
              $('#studentUsername').val(studentData["class"][0]["student_username"]);
              $('#studentPassword').val(studentData["class"][0]["student_password"]);
                
              $.each(studentData["files"], function(){
                $("#table_class_uploaded").append(uploadedFileDataRow(this));                
              });
            }
        });
  }

  function uploadedFileDataRow(item){
    return "<tr id='uploaded_file_" + item.id + "'>" + 
              "<td>-</td>" +
              "<td>" + item.filename + "</td>" +
              "<td>" + 
                  "<a href='<?php echo site_url('modules/downloadFileById/'); ?>" + item.id + "'  ><i class='fa fa-download'></i></a>&nbsp;&nbsp;&nbsp;" +
              "</td>" +
              "</tr>";
}

  function createHtmlChatLine(data){
      var str = "<br/>" + 
              "<div class='item'>" +
                '<img src="https://s-media-cache-ak0.pinimg.com/236x/d4/b1/16/d4b11676cc467b9f3700260c86846007.jpg" alt="Message User Image" data-pin-nopin="true">' + 
                "<p class='message'>" + 
                    "<a href='#' class='name'>" + 
                       "<small class='text-muted pull-right'><i class='fa fa-clock-o'></i>" + String(data['note']['created_date']) + "</small>" + 
                      data['note']['username'] + 
                    "</a>" + 
                    data['note']['message'] + 
                "</p>";
      if(data['files'].length > 0){
          str += "<div class='attachment'>" +
                  "<h4>Attachments:</h4>" +
                  "<p class='filename'>" +
                    "<a href='<?php echo site_url('modules/downloadFileById/'); ?>" + data['files'][0].id + "'  >" + data['files'][0].filename + "</a>" + 
                  "</p>" +
                "</div>";
      }
        str += "</div>";

        return str;


  }

  function getTutorClassPage(){
      var form_data = {
            status: $('#classStatus').val()
        };
      $.post("<?php echo site_url('modules/tutorClassesPage'); ?>", form_data, function(data){ 
              $('.box').html(data);
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
              });
        });
  }

  function getRefundedClassPage(){
        var form_data = {
            status: $('#classStatus').val()
        };
        $.post("<?php echo site_url('modules/refundedClassPage'); ?>", form_data, function(data){ 
              $('.box').html(data);
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
              });
        }); 
  }

  function getCompletedClassPage(){
      var form_data = {
            status: $('#classStatus').val()
        };
      $.post("<?php echo site_url('modules/completedClassPage'); ?>", form_data, function(data){ 
              $('.box').html(data);
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
              });
        });
  }
  
  $(document).ready(function(){
      
      $('#submitRefundClass').click(function() {
        var form_data = {
          classId: $('#refundClassId').val(),
          refundMessage: $('#refundMessage').val()
        };
        $.ajax({
            url: "<?php echo site_url('modules/refundClass'); ?>",
            type: 'POST',
            data: form_data,  
            success: function(msg) {
                if (msg == 'YES'){
                  $('#refund-alert-msg').html('<div class="alert alert-success text-center">Class has been successfully cancelled. Kindly wait for our response in regards on this action.</div>');
                  $("#submitRefundClass").hide();
                }else if (msg == 'NO'){
                    $('#refund-alert-msg').html('<div class="alert alert-danger text-center">Error in cancelling Class! Please try again later.</div>');
                }else{
                    $('#refund-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                }
            }
        });
        return false;
      });

      //NOTES
      $('#submitAddNotes').click(function() {
        var file = input = document.getElementById('notesUploadFile');

        var form_data = new FormData();
        form_data.append('fileupload', file.files.length == 0 ? null : file.files[0]);
        form_data.append('classId', $('#notesClassId').val());
        form_data.append('message', $('#noteMessage').val());

        $.ajax({
            url: "<?php echo site_url('modules/addNotes'); ?>",
            type: 'POST',
            data: form_data,  
            cache: false,
            dataType: 'text', 
            processData: false,
            contentType: false, 
            success: function(result) {
                $('#noteMessage').val("");
                var resultdata = JSON.parse(result);
                var html = "";
                if(resultdata['error']==false){
                    html += createHtmlChatLine(resultdata); 
                    $("#notes-chat-box").append(html);
                    $("#notes-chat-box").animate({scrollTop: $("#notes-chat-box").height() * 1000});

                    $("#uploadedFileCallOut").css("display", "none");
                    $("#uploadedFilename").html("");
                    $('#notesUploadFile').val("");
                }
            },
            error: function(result){
                console.log(result);
            }
        });
        return false;
      });

      //CHANGING CLASS STATUS
      $('#submitChangeStatus').click(function() {
        var form_data = {
          classId: $('#classId').val(),
          status: $('#cmbChangeStatus').val()
        };
        $.ajax({
            url: "<?php echo site_url('modules/changeStatus'); ?>",
            type: 'POST',
            data: form_data,  
            success: function(msg) {
                if (msg == 'YES'){
                  $('#status-alert-msg').html('<div class="alert alert-success text-center">Status has been successfully changed!</div>');
                }else if (msg == 'NO'){
                    $('#status-alert-msg').html('<div class="alert alert-danger text-center">Error in changing status! Please try again later.</div>');
                }else{
                    $('#status-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                }
            }
        });
        return false;
      });

      //ASSIGNING TUTOR
      $('#submitAssignTutor').click(function() {
          var form_data = {
            classid: $('#tutorClassId').val(),
            tutorid: $('#cmbAssignTutor').val()
          };
          $.ajax({
              url: "<?php echo site_url('modules/assignTutor'); ?>",
              type: 'POST',
              data: form_data,  
              success: function(msg) {
                  if (msg == 'YES'){
                    $('#tutor-alert-msg').html('<div class="alert alert-success text-center">Tutor has been successfully Assigned!</div>');
                  }else if (msg == 'NO'){
                      $('#tutor-alert-msg').html('<div class="alert alert-danger text-center">Error in assigning Tutor! Please try again later.</div>');
                  }else{
                      $('#tutor-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                  }
              }
          });
          return false;
      });

      $('#changeStatus').on('hidden.bs.modal', function () {
        if($("#classStatus").val()=="REFUNDED"){
          getRefundedClassPage();
        }else{
          getTutorClassPage(); 
        }
      });

      $('#assignTutor').on('hidden.bs.modal', function () {
          if($("#classStatus").val()=="COMPLETED"){
            getCompletedClassPage();
          }else{
            getTutorClassPage(); 
          }
      })

      $('#refundClass').on('hidden.bs.modal', function () {
          location.reload();
      })
  })
</script>
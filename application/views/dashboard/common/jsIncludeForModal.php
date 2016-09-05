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
      setChatNotes(classid);
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
            $("#notes-chat-box").append(html);
          }
      });
  }

  function createHtmlChatLine(data){
      return "<br/>" + 
              "<div class='item'>" +
                '<img src="https://s-media-cache-ak0.pinimg.com/236x/d4/b1/16/d4b11676cc467b9f3700260c86846007.jpg" alt="Message User Image" data-pin-nopin="true">' + 
                "<p class='message'>" + 
                    "<a href='#' class='name'>" + 
                       "<small class='text-muted pull-right'><i class='fa fa-clock-o'></i>" + data.created_date + "</small>" + 
                      data.username + 
                    "</a>" + 
                    data.message + 
                "</p>" +
              "</div>";


  }

  $(document).ready(function(){
    
      //NOTES
      $('#submitAddNotes').click(function() {
        var form_data = {
          classId: $('#notesClassId').val(),
          message: $('#noteMessage').val()
        };
        $.ajax({
            url: "<?php echo site_url('modules/addNotes'); ?>",
            type: 'POST',
            data: form_data,  
            success: function(result) {
                $('#noteMessage').val("");
                var data = JSON.parse(result);
                var html = ""
                $.each(data, function(){
                    html += createHtmlChatLine(this); 
                });
                $("#notes-chat-box").append(html);
                $("#notes-chat-box").animate({scrollTop: $("#notes-chat-box").height() * 1000});
            }
        });
        return false;
      });

      $('#notes').on('hidden.bs.modal', function () {
          location.reload();
      })

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

      $('#changeStatus').on('hidden.bs.modal', function () {
          location.reload();
      })

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

      $('#assignTutor').on('hidden.bs.modal', function () {
          location.reload();
      })
  })
</script>
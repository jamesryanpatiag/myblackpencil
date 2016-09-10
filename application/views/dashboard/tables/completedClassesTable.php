
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">Table List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Completion Date</th>  
                  <th>Assignment ID</th>  
                  <th>Tutor</th>  
                  <th>Student</th>  
                  <th>Type</th>   
                  <th>Notes</th>   
                  <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
                  <th>Re-Assign to Tutor</th>  
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($list) && !empty($list)){?>
                        <?php foreach($list as $item){ ?>
                            <tr>
                                <td><?php echo $item->completion_date;?></td>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo getUsernameById($item->tutor_id); ?></td>
                                <td><?php echo getUsernameById($item->customer_id);?></td>
                                <td><?php echo getTypeByCode($item->type);?></td>
                                <td><a type="button" class="label label-primary" onClick="setNotesData('<?php echo $item->id;?>')" title="Add Notes" data-toggle="modal" data-target="#notes" >
                                        Add Notes</a>
                                 <td>
                                    <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
                                    <?php if($item->tutor_id==0){?>
                                        <a href="#" data-toggle="modal" data-target="#assignTutor" title="Assign Tutor" class="btn btn-info btn-flat" onClick="setTutorData('<?php echo $item->id; ?>', '')">
                                          <span class="fa fa-user"></span></a>
                                    <?php }else{  ?>
                                        <a href="#" data-toggle="modal" data-target="#assignTutor" title="Change Tutor" class="btn btn-info btn-flat" onClick="setTutorData('<?php echo $item->id; ?>', '<?php echo $item->tutor_id; ?>')">
                                          <span class="fa fa-user"></span></a>
                                    <?php }?>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Completion Date</th>  
                  <th>Assignment ID</th>  
                  <th>Tutor</th>  
                  <th>Student</th>  
                  <th>Type</th>   
                  <th>Notes</th>   
                  <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
                    <th>Re-Assign to Tutor</th>  
                  <?php } ?>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
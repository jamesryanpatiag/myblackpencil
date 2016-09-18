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
      <th>ID</th>  
      <th>Type</th>  
      <th>Start Date</th>  
      <th>End Date</th>  
      <th>Student</th>   
      <th>Description</th>   
      <th>Course</th>  
      <th>Level</th>   
      <th>Notes</th>
      <th>Tutor</th>
      <th>Actions</th> 
    </tr>
    </thead>
    <tbody>
        <?php if(isset($list) && !empty($list)){?>
            <?php foreach($list as $item){ ?>
                <tr>
                    <td><?php echo $item->id;?></td>
                    <td><?php echo getTypeByCode($item->type)?></td>
                    <td><?php echo $item->start_date;?></td>
                    <td><?php echo $item->end_date;?></td>
                    <td><?php echo getUsernameById($item->customer_id);?></td>
                    <td><?php echo $item->description;?></td>
                    <td><?php echo $item->course;?></td>
                    <td><?php echo getEducationalLevelByCode($item->educational_level_code);?></td>
                    <td>
                      <a type="button" class="label label-primary" onClick="setNotesData('<?php echo $item->id;?>')" title="Add Notes" data-toggle="modal" data-target="#notes" >
                            Add Notes</a>
                    </td>
                    <td><?php echo getUsernameById($item->tutor_id);?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-flat" title="Info" data-toggle="modal" onClick="setStudentCredData('<?php echo $item->id;?>')" data-target="#customerCredentials" >
                            <span class="fa fa-info-circle"></button>
                       <button type="button" class="btn btn-warning btn-flat" title="Change Status" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
                            <span class="fa fa-exchange"></button>
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
      <th>ID</th>  
      <th>Type</th>  
      <th>Start Date</th>  
      <th>End Date</th>  
      <th>Student</th>   
      <th>Description</th>   
      <th>Course</th>  
      <th>Level</th>   
      <th>Notes</th>
      <th>Tutor</th>
      <th>Actions</th>
    </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>
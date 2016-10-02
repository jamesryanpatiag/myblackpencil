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
          <th>Refunded Date</th>  
          <th>Assignment ID</th>  
          <th>Tutor</th>  
          <th>Student</th>  
          <th>Type</th>   
          <th>Notes</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php if(isset($list) && !empty($list)){?>
                <?php foreach($list as $item){ ?>
                <tr>
                  <td><?php echo $item->refunded_date;?></td>
                  <td><?php echo $item->classid;?></td>
                  <td><?php echo getUsernameById($item->tutor_id);?></td>
                  <td><?php echo getUsernameById($item->customer_id);?></td>
                  <td><?php echo getTypeByCode($item->type)?></td>
                  <td>
                      <a type="button" class="label label-primary" onClick="setNotesData('<?php echo $item->classid;?>')" title="Add Notes" data-toggle="modal" data-target="#notes" >
                            Add Notes</a>
                  </td>
                  <td>
                      <button type="button" class="btn btn-warning btn-flat" title="Change Status" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
                                <span class="fa fa-exchange"></button>

                      <button type="button"
                        data-toggle="modal" 
                        onClick="getRefundClassData('<?php echo $item->classid;?>')" 
                        data-target="#refundClass" 
                        class="btn btn-danger btn-flat" title="Refund/Cancel Class"><span class="fa fa-warning"></span></button>
                  </td>
                </tr>
                <?php }?>
            <?php }?>
        </tbody>
        <tfoot>
        <tr>
			<th>Refunded Date</th>  
			<th>Assignment ID</th>  
			<th>Tutor</th>  
			<th>Student</th>  
			<th>Type</th>   
			<th>Notes</th>
  <th>Actions</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
</div>
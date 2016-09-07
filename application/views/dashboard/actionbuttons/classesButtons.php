<button type="button" class="btn btn-info btn-flat" title="Info" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#customerCredentials" >
    <span class="fa fa-info-circle"></button>
<button type="button" class="btn btn-warning btn-flat" title="Change Status" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
    <span class="fa fa-exchange"></button>
<?php if($item->tutor_id==0){?>
    <a href="#" data-toggle="modal" data-target="#assignTutor" title="Assign Tutor" class="btn btn-info btn-flat" onClick="setTutorData('<?php echo $item->id; ?>', '')">
      <span class="fa fa-user"></span></a>
<?php }else{  ?>
    <a href="#" data-toggle="modal" data-target="#assignTutor" title="Change Tutor" class="btn btn-info btn-flat" onClick="setTutorData('<?php echo $item->id; ?>', '<?php echo $item->tutor_id; ?>')">
      <span class="fa fa-user"></span></a>
<?php }?>
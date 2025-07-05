
<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
  header('Location:index.php'); 
}
include "../header.php";
?>

    <div class="span9" id="content">
        <div class="row-fluid">
          <div class="navbar">
            <div class="navbar-inner">
              <ul class="breadcrumb">
                <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">Pick Up Port List</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Pick Up Port Management </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/pickup_port/add.php"><button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button></a>
                  </div>
                </div>
                <br>
              

                <?php 

                

                     $sql = "select * from  tbl_pick_up_port order by id asc";
                    $result = mysqli_query($connect,$sql);
                    $arr_users = [];
                    if ($result->num_rows > 0) {
                        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                    }

                    ?>
                  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

                <table id="tblUser" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Pick Up Port</th>
                      <th>Port Code</th>
                      <th>Latitutde</th>
                      <th>Longitude</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($arr_users)) 
                    { ?>
                      <?php 
                      $count = 0;
                      foreach($arr_users as $user) { 

                        ?>
                      <tr>
                          <td><?php print  $count+1; ?></td>
                          
                          <td><?php echo $user['port']; ?></td>
                          <td><?php echo $user['code']; ?></td>
                          <td><?php echo $user['lat']; ?></td>
                          <td><?php echo $user['lng']; ?></td>
 
                          <td align="center" id="make_status_row_2">
                            <?php if($user['status'] == '1'){ ?>

                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0" id="" onclick="return confirm('Are you sure change status?')"><img src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>

                            <?php } else { ?> 
                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1" class="inactive_status" onclick="return confirm('Are you sure change status?')" id=""><img src="<?php echo $base_url ?>/assets/img/erase.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>
                            <?php } ?>                                         
                          </td>
                          <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                          <td>
                          <!--   <a href="view_all_record.php?pid=<?php print $user['id']?>" onclick="viewRecord('<?php print $user['id']?>')"><i class="fa fa-eye"></i></a>&nbsp;
 -->
                            <a href="edit.php?pid=<?php print $user['id']?>"><i class="fa fa-pencil"></i></a>&nbsp;
                            
                            <a href="delete.php?pid=<?php echo $user['id']; ?>" class="delete_status" onclick="return confirm('Are you sure delete record?')" ><i class="fa fa-trash"></i></a>&nbsp;
                            
                          </td>
                      </tr>
                      <?php $count++; } ?>
                      <?php } ?>    
                  </tbody>
                </table>
              </div>
              
          </div>
          </div>
          <!-- /block -->
        </div>
    </div>
  </div>
</div>
<?php include "../footer.php";  ?>

<!-- <div id="viewRecordModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">View Record</h4>
      </div>
      <div class="modal-body" id="partner_full_details">
        
      </div>
    
    </div>

  </div>
</div> -->



<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable({
      "pageLength": 10
      });
});

// function viewRecord(id){
//   // alert(id);
//   $('#viewRecordModal').modal('show');
//   // $.ajax({
//   //       url:"ajax/view_order_details.php",
//   //       method:"POST",
//   //       data:{order_id:order_id},
//   //       success:function(data)
//   //       {
          
//   //         $('#viewOrderModal').modal('show');
//   //         $('#order_full_details').html('');
//   //         $('#order_full_details').html(data);
       
//   //       }
//   //    });

// }
</script>

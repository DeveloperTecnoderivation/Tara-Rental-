
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">Chassis View List</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Chassis Details list </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <br>
                <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
                  <div class="row-fluid">  
                    

                    <div class="span4">
                     
                    </div>
                    <div class="span4"></div>
                     <div class="span4" style="text-align:right;">
                          <div class="table-toolbar">
                              <div class="btn-group">
                                <a href="<?php echo $base_url ?>/truck_partner/view.php" class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</a>
                              </div>
                            </div>
                      </div>

                  </div>
                  <div class="row-fluid">  
                    

                    <div class="span4">
                      <input type="submit" name="search" value="Search" class="btn btn-primary">
                      <a class="btn" href="<?php echo $base_url ?>/truck_partner/truck_view_details.php">Reset</a>
                    </div>

                  </div>
                 
                </form>

                <?php 

                     $sql = "select * from  tbl_users  WHERE 1 = 1 {$whereSQL1} {$whereSQL2} {$whereSQL3} {$whereSQL4} and role='truck_partner' order by id asc";
                    $result = mysqli_query($connect,$sql);
                    $arr_users = [];
                    if ($result->num_rows > 0) {
                        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                    }

                    $partner_id = intval($_GET['user_id'] ?? 0);
                    $query_truck = "SELECT * FROM tbl_truck WHERE truck_partner_id = '$partner_id' AND types = 'chassis'";
                    $result_truck = mysqli_query($connect, $query_truck);

                    ?>
                   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

                   <table id="tblTruck" class="table table-hover table-bordered">
                   <thead>
               <tr>
            <th>ID</th>
            <th>Driver Name</th>
            <th>Model</th>
            <th>Plate No</th>
            <th>Trailer Type</th>
            <th>Image</th>
            <th>Created</th>
              </tr>
               </thead>

               <tbody>
            
        <?php while($row = mysqli_fetch_assoc($result_truck)) { ?>
            <?php 
            $chassis_id = $row['id']; 

            $driver_sql = "SELECT f_name, l_name FROM tbl_users WHERE chassis_id = '$chassis_id' LIMIT 1";
            $driver_result = mysqli_query($connect, $driver_sql);
            $driver_name = " ";

                $driver = mysqli_fetch_assoc($driver_result);
                $driver_name = $driver['f_name'] . ' ' . $driver['l_name'];

           $chassis_type = $row['trailer_type'];
            $getdata_car4="select * from tbl_chassis_trailer_type where id = $chassis_type";  
                              $partner4=mysqli_query($connect,$getdata_car4);
                              $rown_car4=mysqli_fetch_array($partner4);
                              $brand4 = $rown_car4['trailer_type'];
            ?>
            <tr>
            <td><?php print  $count+1; ?></td>
            <td><?php echo htmlspecialchars($driver_name); ?></td>
                <td><?php echo htmlspecialchars($row['model']); ?></td>
                <td><?php echo htmlspecialchars($row['plate_no']); ?></td>
                <td><?php echo htmlspecialchars($rown_car4['trailer_type']); ?></td>
                <td>
                <?php if($row['image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $row['image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?> 
                </td>
                <td><?php echo date("d M Y", strtotime($row['created'])); ?></td>
            </tr>
        <?php $count++; } ?>
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
    $('#tblTruck').DataTable({
        "pageLength": 25
    });
});
</script>

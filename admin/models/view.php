
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active"> Model</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left"> Model Management </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/models/add.php"><button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button></a>
                  </div>
                </div>
                <br>
                <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
                  <div class="row-fluid">
                    <div class="span4">
                        <select  name="make_id" class="form-control" id="make_id" required="required" onchange="disableaddress()">
                          <option value="">--Select Make--</option> 
                          <?php 
                          $query="SELECT * FROM tbl_vehicle_brand WHERE status=1";
                          $results = mysqli_query($connect, $query);
                          foreach ($results as $make_list){
                          ?>
                          <option value="<?php echo $make_list["id"];?>" <?php if($_GET['make_id'] == $make_list["id"]){ echo "selected"; }?>><?php echo $make_list["name"];?></option> 
                          <?php } ?>
                        </select>
                    </div>
                    <div class="span4">
                      <input type="text" name="name" class="input-xlarge focused" placeholder="Name" id="name" value="<?php echo $_GET['name'] ?>">
                    </div>
                    <div class="span4">
                      <select name="status">
                        <option value="" <?php if($_GET['status'] == ''){ echo "selected"; }?>>Please Select</option>
                        <option value="1" <?php if($_GET['status'] == '1'){ echo "selected"; }?>>Active</option>
                        <option value="0" <?php if($_GET['status'] == '0'){ echo "selected"; }?>>Deactive</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="row-fluid">&nbsp;</div>
                  <div class="row-fluid">
                    <div class="span4">
                      <input type="submit" name="search" value="Search" class="btn btn-primary">
                      <a class="btn" href="<?php echo $base_url ?>/users/view.php">Reset</a>
                    </div>
                  </div>
                  
                 
                </form>

                <?php 

                // echo $_GET['name'];

                    if(!empty($_GET['make_id'])){
                        $make_name = $_GET['make_id']; 
                        $whereSQL1 = "AND make_id = $make_name"; 
                    } 


                    if(!empty($_GET['name'])){
                        $search_name = $_GET['name']; 
                        $whereSQL1 = "AND name LIKE '%" . $search_name . "%'"; 
                    } 

                    if(!empty($_GET['status'])){
                        $search_status = $_GET['status']; 
                        $whereSQL2 = "AND status = $search_status"; 
                    } 

                    $sql = "select * from  tbl_vehicle_models  WHERE 1 = 1 {$whereSQL1} {$whereSQL2} order by id asc";
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
                      <th>Brand</th>
                      <th>Model</th>
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

                          $make_id = $user['make_id'];

                        $getdata_make="select * from tbl_vehicle_brand where id=$make_id";  
                        $gdata_make=mysqli_query($connect,$getdata_make);
                        $rown_make=mysqli_fetch_array($gdata_make);
                        $make_name = $rown_make['name']; 
                          // print_r($user);
                        ?>
                      <tr>
                          <td><?php print  $count+1; ?></td>
                          <td><?php echo $make_name ?></td>
                          <td><?php echo $user['name']; ?> </td>
                          <td>
                          <?php if($user['status'] == '1'){ ?>

                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0" id="" onclick="return confirm('Are you sure change status?')"><img src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>

                            <?php } else { ?> 
                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1" class="inactive_status" onclick="return confirm('Are you sure change status?')" id=""><img src="<?php echo $base_url ?>/assets/img/erase.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>
                            <?php } ?>                                         
                          </td>
                          <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                          <td>
                            <a href="edit.php?pid=<?php print $user['id']?>"><i class="fa fa-pencil"></i></a>&nbsp;
                            
                            <a href="delete.php?pid=<?php echo $user['id']; ?>" class="delete_status" onclick="return confirm('Are you sure delete product?')" ><i class="fa fa-trash"></i></a>&nbsp;
                            
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

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable({
      "pageLength": 25
      });
});
</script>

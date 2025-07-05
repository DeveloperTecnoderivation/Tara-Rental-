<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
  header('Location:index.php'); 
}
?>
<?php include "../header.php";  ?>
<div class="span10" id="content">
    <div class="row-fluid">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar"
                            rel="tooltip">&nbsp;</a></i>
                    <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar"
                            rel="tooltip">&nbsp;</a></i>
                    <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span>
                    </li>
                    <li class="active">Add Notification</li>
                </ul>
            </div>
        </div>
    </div>

   <div class="row-fluid">
    <!-- block -->
  <div class="block" style="padding: 10px; max-width: 93%; margin: auto; border: 1px solid #ddd; border-radius: 5px; background:rgba(249, 249, 249, 0.81);">
  <div class="navbar navbar-inner block-header" style="margin-bottom: 15px;">
    <div class="muted pull-left" style="font-weight: bold; font-size: 18px;">Add New Notification</div>
  </div>
  <form id="notificationForm" name="notificationForm" method="post" action="save.php" enctype="multipart/form-data" style="font-family: Arial, sans-serif;">
    <fieldset>

      <div class="control-group" style="margin-bottom: 10px; display: flex; align-items: center;">
        <label for="title" style="width: 130px; font-weight: 600;">Title<span style="color: red;">*</span></label>
        <input type="text" name="title" id="title" placeholder="Title" required
          style="flex-grow: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
        <div id="title_error" class="error_msg" style="color: red; margin-left: 10px;"></div>
      </div>

      <div class="control-group" style="margin-bottom: 15px; display: flex; align-items: center;">
        <label for="roleSelect" style="width: 130px; font-weight: 600;">Select Role<span style="color: red;">*</span></label>
        <select id="roleSelect" name="role" required
          style="flex-grow: 1; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px;">
          <option value="">-- Select Role --</option>
          <option value="user">Users</option>
          <option value="driver">Driver</option>
          <option value="truck_partner">Truck Partner</option>
          <option value="car_owner">Car Owner</option>
        </select>
        <div id="role_error" class="error_msg" style="color: red; margin-left: 10px;"></div>
      </div>

      <div class="control-group" style="margin-bottom: 15px; display: flex; align-items: flex-start; justify-content: center;">
        <label for="userSelect" style="width: 130px; font-weight: 600; margin-bottom: 0; padding-top: 6px;">Select Users<span style="color: red;">*</span></label>
        <div style="flex-grow: 1; max-width: 900px;">
          <select name="users_id[]" id="userSelect" multiple required
            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; height: 120px; box-sizing: border-box; resize: vertical;">
            <!-- AJAX fills options here -->
          </select>
          <div id="users_error" class="error_msg" style="color: red; margin-top: 5px;"></div>
        </div>
      </div>

      <div class="control-group" style="margin-bottom: 15px; display: flex; align-items: center;">
       <label for="notification_image" style="width: 130px; font-weight: 600;">Image<span style="color: red;">*</span></label>
       <input type="file" name="notification_image" id="notification_image" class="input-xlarge focused" required="required" accept="image/*" style="width: 100%;">
        <div id="image_error" class="error_msg" style="color: red; margin-left: 10px;"></div>
      </div>

      <div class="control-group" style="margin-bottom: 15px; display: flex; align-items: flex-start;">
        <label for="content" style=" font-weight: 600; padding-top: 8px; margin-bottom: 0;">Content <span style="color: red;">*</span></label>
        <textarea name="content" id="content" rows="5" required placeholder="Enter content here..."
      style="width: 100%; font-size: 14px; margin-left: 75px; border: 1px solid #ccc; border-radius: 4px; resize: vertical;"></textarea>
        <div id="content_error" class="error_msg" style="color: red; margin-left: 10px; margin-top: 5px;"></div>
      </div>

      <div class="form-actions" style="display: flex; justify-content: flex-start; margin-left: 130px; margin-top: 5px;">
        <input type="submit" name="submit" value="Send" class="btn btn-primary" style="margin-right: 10px; padding: 8px 20px;">
        <a href="view.php" class="btn btn-default" style="padding: 8px 20px;">Cancel</a>
      </div>

    </fieldset>
  </form>
</div>
    <!-- /block -->
</div>

<?php include "../footer.php";  ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validate -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

<!-- Bootstrap Multiselect CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/css/bootstrap-multiselect.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/js/bootstrap-multiselect.min.js"></script>

<script>
$(document).ready(function() {

    // Initialize multiselect on the empty select box
    $('#userSelect').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        buttonWidth: '100%',
        maxHeight: 300,
        nonSelectedText: 'Select users',
        allSelectedText: 'All users selected',
        selectAllText: 'Select all'
    });

    // Load users via AJAX on role change
    $('#roleSelect').change(function() {
        var role = $(this).val();
        if (role !== "") {
            $.ajax({
                url: 'get_users.php',
                method: 'POST',
                data: { role: role },
                success: function(response) {
                    // Replace options and rebuild multiselect
                    $('#userSelect').html(response);
                    $('#userSelect').multiselect('rebuild');
                },
                error: function() {
                    alert('Error loading users.');
                    $('#userSelect').html('');
                    $('#userSelect').multiselect('rebuild');
                }
            });
        } else {
            $('#userSelect').html('');
            $('#userSelect').multiselect('rebuild');
        }
    });

    // Form validation
    $('#notificationForm').validate({
        ignore: [], // important to validate hidden multiselect inputs
        rules: {
            title: {
                required: true,
            },
            role: {
                required: true
            },
            'users_id[]': {
                required: true,
                minlength: 1
            },
            notification_image: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            },
            content: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter a title",
            },
            role: {
                required: "Please select a role"
            },
            'users_id[]': {
                required: "Please select at least one user",
                minlength: "Please select at least one user"
            },
            notification_image: {
                required: "Please upload an image",
                extension: "Only image files (jpg, jpeg, png, gif) are allowed"
            },
            content: {
                required: "Please enter the content",
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            if (element.prop('type') === 'file') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

});
</script>
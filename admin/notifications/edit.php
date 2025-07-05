<?php
include("../conn-web/cw.php");
$pid = $_REQUEST['pid'];
$sql = "SELECT * FROM tbl_notifications WHERE id = $pid";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$selectedUsers = explode(',', $row['users_id']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Notification</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.0/dist/css/bootstrap-multiselect.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.0/dist/js/bootstrap-multiselect.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Edit Notification</h2>
        <form id="notificationForm" action="update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
            </div>

            <div class="form-group">
                <label>Select Role</label>
                <select id="roleSelect" name="role" class="form-control" required>
                    <option value="">-- Select Role --</option>
                    <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>Users</option>
                    <option value="driver" <?php if ($row['role'] == 'driver') echo 'selected'; ?>>Driver</option>
                    <option value="truck_partner" <?php if ($row['role'] == 'truck_partner') echo 'selected'; ?>>Truck Partner</option>
                    <option value="car_owner" <?php if ($row['role'] == 'car_owner') echo 'selected'; ?>>Car Owner</option>
                </select>
            </div>

            <div class="form-group">
                <label>Select Users</label>
                <select name="users_id[]" id="userSelect" multiple class="form-control">
                    <!-- AJAX will populate options -->
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <?php if (!empty($row['image'])) echo "<img src='../../documents/{$row['image']}' width='100'>"; ?>
                <input type="file" name="notification_image" class="form-control">
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="4" class="form-control" required><?php echo $row['content']; ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-danger" href="<?php echo $base_url; ?>/notifications/view.php">Cancel</a>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var selectedUsers = <?php echo json_encode($selectedUsers); ?>;

            $('#userSelect').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                buttonWidth: '100%',
                maxHeight: 300
            });

            function loadUsers(role) {
                $.ajax({
                    url: 'get_users.php',
                    method: 'POST',
                    data: {
                        role: role
                    },
                    success: function(response) {
                        $('#userSelect').html(response);
                        $('#userSelect').val(selectedUsers);
                        $('#userSelect').multiselect('rebuild');
                    }
                });
            }

            $('#roleSelect').change(function() {
                var role = $(this).val();
                if (role !== "") {
                    loadUsers(role);
                } else {
                    $('#userSelect').html('').multiselect('rebuild');
                }
            });

            if ($('#roleSelect').val() !== '') {
                loadUsers($('#roleSelect').val());
            }

            $('#notificationForm').validate({
                rules: {
                    title: {
                        required: true
                    },
                    role: {
                        required: true
                    },
                    'users_id[]': {
                        required: true
                    },
                    content: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "Please enter a title"
                    },
                    role: {
                        required: "Please select a role"
                    },
                    'users_id[]': {
                        required: "Please select at least one user"
                    },
                    content: {
                        required: "Please enter the content"
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    error.insertAfter(element);
                }
            });
        });
    </script>
</body>

</html>
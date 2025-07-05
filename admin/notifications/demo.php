  <form id="notificationForm" action="save.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Select Role</label>
            <select id="roleSelect" name="role" class="form-control" required>
                <option value="">-- Select Role --</option>
                <option value="user">Users</option>
                <option value="driver">Driver</option>
                <option value="truck_partner">Truck Partner</option>
                <option value="car_owner">Car Owner</option>

            </select>
        </div>

        <div class="form-group">
            <label>Select Users</label>
            <select name="users_id[]" id="userSelect" multiple class="form-control">
                <!-- Filled via AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="notification_image" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Send</button>
    </form>



    
<script>
$(document).ready(function() {
    $('#userSelect').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        buttonWidth: '100%',
        maxHeight: 300
    });
    $('#roleSelect').change(function() {
        var role = $(this).val();
        if (role !== "") {
            $.ajax({
                url: 'get_users.php',
                method: 'POST',
                data: { role: role },
                success: function(response) {
                    $('#userSelect').html(response);
                    $('#userSelect').multiselect('rebuild');
                }
            });
        } else {
            $('#userSelect').html('');
            $('#userSelect').multiselect('rebuild');
        }
    });
});

$(document).ready(function () {
    $('#notificationForm').validate({
        rules: {
            title: {
                required: true,
            },
            role: {
                required: true
            },
            'users_id[]': {
                required: true
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
                required: "Please select at least one user"
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
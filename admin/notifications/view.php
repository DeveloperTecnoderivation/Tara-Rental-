<?php
include("../conn-web/cw.php");
session_start();
if (!$_SESSION["tata_login_username"]) {
    header('Location: index.php');
    exit;
}
include "../header.php";
?>

<div class="span12" id="content">
    <div class="row-fluid">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li>
                    <li class="active">Notification List</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Notification Management</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <!-- ADD NEW BUTTON -->
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="<?php echo $base_url ?>/notifications/add.php">
                                <button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button>
                            </a>
                        </div>
                    </div>
                    <br>

                    <!-- SEARCH FORM -->
                  <form method="get" class="form-horizontal" accept-charset="utf-8">
    <div class="row-fluid">
        <div class="span3">
            <input type="text" name="name" class="input-xlarge focused" placeholder="Name or Company"
                value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
        </div>

        <div class="span3">
            <select name="status">
                <option value="" <?php echo (isset($_GET['status']) && $_GET['status'] === '') ? 'selected' : ''; ?>>Please Select</option>
                <option value="1" <?php echo (isset($_GET['status']) && $_GET['status'] === '1') ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo (isset($_GET['status']) && $_GET['status'] === '0') ? 'selected' : ''; ?>>Deactive</option>
            </select>
        </div>

        <div class="span3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
            <a class="btn" href="view.php">Reset</a>
        </div>
    </div>
</form>

<?php
$whereSQL = "WHERE 1=1";

if (!empty($_GET['name'])) {
    $name = mysqli_real_escape_string($connect, $_GET['name']);

    $whereSQL .= " AND (
        n.title LIKE '%$name%' 
        OR n.content LIKE '%$name%'
        OR EXISTS (
            SELECT 1 FROM tbl_users u 
            WHERE FIND_IN_SET(u.id, n.users_id) > 0 
            AND (u.f_name LIKE '%$name%' OR u.l_name LIKE '%$name%' OR u.company_name LIKE '%$name%')
        )
    )";
}

if (isset($_GET['status']) && ($_GET['status'] === '0' || $_GET['status'] === '1')) {
    $status = intval($_GET['status']);
    $whereSQL .= " AND n.status = $status";
}

$sql = "SELECT n.* 
        FROM tbl_notifications n
        $whereSQL
        ORDER BY n.id ASC";

$result = mysqli_query($connect, $sql);

if (!$result) {
    echo "Error in query: " . mysqli_error($connect);
}
?>
                    <!-- DataTables CSS -->
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="tblUser" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Title</th>
                                    <th>Users</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $sno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $sno++ . "</td>";
                                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";

                                        // Convert user IDs to names
                                        $user_ids = explode(',', $row['users_id']);
                                        $user_names = [];
                                        foreach ($user_ids as $uid) {
                                            $uid = trim($uid);
                                            $user_sql = "SELECT f_name, l_name, company_name, role FROM tbl_users WHERE id = '$uid'";
                                            $user_result = mysqli_query($connect, $user_sql);
                                            if ($user_row = mysqli_fetch_assoc($user_result)) {
                                                if ($user_row['role'] == 'truck_partner') {
                                                    $user_names[] = $user_row['company_name'];
                                                } else {
                                                    $user_names[] = $user_row['f_name'] . " " . $user_row['l_name'];
                                                }
                                            }
                                        }
                                        echo "<td>" . implode(', ', $user_names) . "</td>";

                                        // Image
                                        echo "<td>";
                                        if (!empty($row['image']) && file_exists("../../documents/" . $row['image'])) {
                                            echo "<img src='../../documents/" . htmlspecialchars($row['image']) . "' width='100'>";
                                        } else {
                                            echo "No image";
                                        }
                                        echo "</td>";

                                        // Content, Status, Date, Actions
                                       echo "<td>" . nl2br(htmlspecialchars($row['content'])) . "</td>";

echo '<td align="center" id="make_status_row_2">';
if ($row['status'] == '1') {
    echo '<a href="change_status.php?pid=' . $row['id'] . '&status=0" onclick="return confirm(\'Are you sure change status?\')">
            <img src="' . $base_url . '/assets/img/tick.png" width="16" height="16" alt="Click to unblock" title="Click to unblock">
          </a>';
} else {
    echo '<a href="change_status.php?pid=' . $row['id'] . '&status=1" class="inactive_status" onclick="return confirm(\'Are you sure change status?\')" >
            <img src="' . $base_url . '/assets/img/erase.png" width="16" height="16" alt="Click to unblock" title="Click to unblock">
          </a>';
}
echo '</td>';

echo "<td>" . htmlspecialchars($row['created']) . "</td>";

echo "<td>
        <a href='edit.php?pid=" . $row['id'] . "'><i class='fa fa-pencil'></i></a>&nbsp;
        <a href='delete.php?pid=" . $row['id'] . "' onclick=\"return confirm('Are you sure to delete this notification?')\">
            <i class='fa fa-trash'></i>
        </a>
      </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- DataTables Script -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#tblUser').DataTable();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>
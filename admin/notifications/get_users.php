<?php
include("../conn-web/cw.php");

if (isset($_POST['role'])) {
    $role = $_POST['role'];

    $sql = "SELECT id, f_name, l_name, email, company_name FROM tbl_users WHERE role = '$role' ORDER BY id ASC";
    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if ($role == "truck_partner") {
            $label = $row['company_name'] . ' (' . $row['email'] . ')';
        } else {
            $label = $row['f_name'] . ' ' . $row['l_name'] . ' (' . $row['email'] . ')';
        }
        echo '<option value="' . $row['id'] . '">' . $label . '</option>';
    }
}
?>

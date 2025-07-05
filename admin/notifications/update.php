<?php
include("../conn-web/cw.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid      = $_POST['pid'];
    $title    = $_POST['title'];
    $role     = $_POST['role'];
    $content  = $_POST['content'];
    $status   = "1";

    $users = isset($_POST['users_id']) ? $_POST['users_id'] : [];
    $users_id = implode(",", $users);
    $data = "SELECT image FROM tbl_notifications WHERE id = $pid";
    $result = mysqli_query($connect, $data);
    $row = mysqli_fetch_assoc($result);
    $current_image = $row['image'];

    if (!empty($_FILES['notification_image']['name'])) {
        $image = $_FILES['notification_image']['name'];
        $target_dir = "../../documents/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES["notification_image"]["tmp_name"], $target_file)) {
            $final_image = $image;
        } else {
            $final_image = $current_image; 
        }
    } else {
        $final_image = $current_image;
    }

    // Final update query
    $sql = "UPDATE tbl_notifications SET 
                title = '$title',
                role = '$role',
                users_id = '$users_id',
                image = '$final_image',
                content = '$content',
                status = '$status'
            WHERE id = $pid";

    if (mysqli_query($connect, $sql)) {
        header("Location: view.php?msg=updated");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

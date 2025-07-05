<?php
include("../conn-web/cw.php");

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $role=$_POST['role'];
    $content = $_POST['content'];
    
    $current_date = date('Y-m-d');
    $time = date('H:i:s');
    $date_time = date('Y-m-d h:i:s');

    $user_ids = implode(',', $_POST['users_id']);    

    $allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif");

    $notification_image = end(explode(".", $_FILES["notification_image"]["name"]));
    if (($_FILES["notification_image"]["type"] == "application/pdf") || ($_FILES["notification_image"]["type"] == "application/msword") ||($_FILES["notification_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["notification_image"]["type"] == "image/png") || ($_FILES["notification_image"]["type"]=="image/jpeg") || ($_FILES["notification_image"]["type"] == "image/jpg") && ($_FILES["notification_image"] ["size"] < 7340032) && in_array($notification_image_extension,  $allowedExts))
    {
      if ($_FILES["notification_image"]["error"] > 0)
      {
        $notification_image = '';
      }
      else
      {
           $filetmp_name=$_FILES ['notification_image']['tmp_name'];
           $name=$_FILES ['notification_image']['name'];
           $randomNumber = rand(15,35);
           $rn = $randomNumber.'-';		
           $ext = strtolower(substr($name, strpos($name, '.') +1));
           $name = $rn.str_replace(' ','-',trim($name));
           $notification_image = $name;
           
           $path = "../../documents/";
           // echo $path.$notification_image;
           copy($filetmp_name,$path.$notification_image);
              $notification_image = $notification_image;
      }
    } else{
     $notification_image = '';
    }

    // // Save to DB
    // $stmt ="INSERT INTO tbl_notifications ( title,users_id, role, image, content) VALUES (?, ?, ?, ?, ?)";
    // $stmt->bind_param("sssss",$title ,$user_ids, $role, $notification_image, $content);
    // $stmt->execute();

    $created = date('Y-m-d');

   $sql="insert into tbl_notifications ( title,users_id, role, image, content , status ,created,time,date_time) values('$title' ,'$user_ids', '$role', '$notification_image', '$content','1' ,'$created','$time','$date_time')"; 

    $qrs=mysqli_query($connect,$sql);
    header("location: view.php");
}
?>










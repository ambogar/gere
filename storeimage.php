
<?php
    
    $last_id = $_GET["id"];
    $img = $_POST['image'];
    $folderPath = "uploads/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $last_id . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    
    // include database connection file
    include_once("config.php");
                
    // Insert user data into table
    mysqli_query($conn, "UPDATE daftar_tamu SET foto = '$fileName' WHERE id=$last_id");
    
    header("Location: index.php");
?>
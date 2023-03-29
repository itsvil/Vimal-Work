<?php
    require("config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM `regi_data` WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("location: display_vaild.php");
        } else {
            echo "Failed";
        }
    }
?>
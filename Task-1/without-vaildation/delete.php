<?php
    require("config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $date = $_POST['date'];
        // $gender = $_POST['gender'];
        // $hobbies =$_POST['hobbies'];
        // $course = $_POST['course'];
        // $moblie = $_POST['moblie'];
        // $address = $_POST['address'];
        // $pincode = $_POST['pincode'];
        // $city = $_POST['city'];
        // $state = $_POST['state'];
        // $password = $_POST['password'];

        $sql = "DELETE FROM `regi_data` WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("location: display.php");
        } else {
            echo "Failed";
        }
    }
?>
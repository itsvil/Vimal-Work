<?php
    require("config.php");       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Insert Vaild</title>
</head>
<body>
<center>
    <h1>Display Data</h1>
    <button ><a href="registration_vaild.php">INSERT VAILDATION</a></button>&nbsp;&nbsp; 
    <br><br> 
    <table border="1">
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>DOB</td>
            <td>Gender</td>
            <td>Hobbies</td>
            <td>Course</td>
            <td>Moblie No</td>
            <td>Address</td>
            <td>Pin Code</td>
            <td>City</td>
            <td>State</td>
            <td>Password</td>
            <td>Opertion</td>
        </tr>
        <?php
            $sql = "SELECT * FROM regi_data WHERE status=1";
            $query = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($query)){
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $date = date('d-m-Y',strtotime($row['date']));
                $gender = $row['gender'];
                $hobbies = $row['hobbies'];
                $course = $row['course'];
                $moblie = $row['moblie'];
                $address = $row['address'];
                $pincode = $row['pincode'];
                $city = $row['city'];
                $state = $row['state'];
                $password = $row['password'];
        
                echo "
                    <tr>
                        <td>$id</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$date</td>
                        <td>$gender</td>
                        <td>$hobbies</td>
                        <td>$course</td>
                        <td>$moblie</td>
                        <td>$address</td>
                        <td>$pincode</td>
                        <td>$city</td>
                        <td>$state</td>
                        <td>$password</td>
                        <td>
                            <button><a href='update_vaild.php?id=".$id."'>VAILD EDIT</a></button>
                            <button><a href='delete.php?id=".$id."'>DELETE</a></button>
                        </td>
                    </tr>
                ";
        
            }
        ?>
    </table>
</center>
<?php
    // Soft Delete Code
    if(isset($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];

        $query = mysqli_query($conn,"UPDATE regi_data SET status=0 WHERE id='$id'");
        echo "<script>window.location.href='display.php';</script>";
    }
?>
</body>
</html>
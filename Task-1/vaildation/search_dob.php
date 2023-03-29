<?php
    require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <center>
        <form action="" method="post">
            <h1>Search Data</h1>
            <input type="date" name="search" >
            <input type="submit" name="submit" value="SEARCH">
        </form>
        <br><br>
        <?php
            if(isset($_POST['submit']) && $_POST['search'] !== ""){
                $search = $_POST['search'];
                $sql = "select * from regi_data where date = '$search'";
                $query = mysqli_query($conn,$sql);

                if(mysqli_num_rows($query) > 0){
                    echo "
                        <table border='2'>
                            <tr>
                                <td>Id</td>
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
                            </tr>
                    ";

                    while($row = mysqli_fetch_assoc($query)){
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
                        </tr>
                        ";
                    }
                } else {
                    echo "No Data Found.";
                }
            } 
        ?>
    </center>
</body>
</html>
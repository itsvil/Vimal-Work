<?php
    require("config.php");  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM regi_data WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query)){
            $id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $date = $row['date'];
            $gender = $row['gender'];
            $hobbies = explode(',',$row['hobbies']);
            $course = $row['course'];
            $moblie = $row['moblie'];
            $address = $row['address'];
            $pincode = $row['pincode'];
            $city = $row['city'];
            $state = $row['state'];
            $password = $row['password'];
        }

        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $date = $_POST['date'];
            $gender = $_POST['gender'];
            $hobbies = implode(',',$_POST['hobbies']);
            $course = $_POST['course'];
            $moblie = $_POST['moblie'];
            $address = $_POST['address'];
            $pincode = $_POST['pincode'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $password = $_POST['password'];
    
            $update = "UPDATE regi_data SET id='$id',fname='$fname',lname='$lname',date='$date',gender='$gender',hobbies='$hobbies',course='$course',moblie='$moblie',address='$address',pincode='$pincode',city='$city',state='$state',password='$password' WHERE id='$id'";
            $query = mysqli_query($conn,$update);
            if($query){
                header("location: display.php");
            } else {
                echo "Failed...!";
            }
        }  
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
<center> 
    <form action="" method="post" autocomplete="off">
        <h1>Update Data</h1>
        <table border="1">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" id="fname" value="<?php echo $fname ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" id="lname" value="<?php echo $lname ?>"></td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="date" name="date" id="date" value="<?php echo $date ?>" max="<?php echo date("Y-m-d"); ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" id="gender" value="MALE" <?php if($gender=="MALE"){ echo "checked"; } ?>>MALE
                    <input type="radio" name="gender" id="gender" value="FEMALE" <?php if($gender=="FEMALE"){ echo "checked"; } ?>>FEMALE
                    <input type="radio" name="gender" id="gender" value="OTHER" <?php if($gender=="OTHER"){ echo "checked"; } ?>>OTHER
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td>
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="PLAYING" 
                        <?php if(in_array("PLAYING",$hobbies)){ echo "checked"; } ?>
                    >PLAYING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="CODING" 
                        <?php if(in_array("CODING",$hobbies)){ echo "checked"; } ?>
                    >CODING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="READING" 
                        <?php if(in_array("READING",$hobbies)){ echo "checked"; } ?>
                    >READING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="OTHER" 
                        <?php if(in_array("OTHER",$hobbies)){ echo "checked"; } ?>
                    >OTHER
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <select name="course" id="course">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="BCA" <?php if($course=="BCA"){ echo "selected"; } ?>>BCA</option>
                        <option value="BCOM" <?php if($course=="BCOM"){ echo "selected"; } ?>>BCOM</option>
                        <option value="BBA" <?php if($course=="BBA"){ echo "selected"; } ?>>BBA</option>
                        <option value="BA" <?php if($course=="BA"){ echo "selected"; } ?>>BA</option>
                        <option value="OTHER" <?php if($course=="OTHER"){ echo "selected"; } ?>>OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Moblie No</td>
                <td><input type="text" name="moblie" id="moblie" value="<?php echo $moblie ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <textarea name="address" id="address" cols="20" rows="5"><?php echo $address ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Pin Code</td>
                <td>
                    <input type="text" name="pincode" id="pincode" value="<?php echo $pincode ?>">
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    <select name="city" id="city">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="SURAT" <?php if($city=="SURAT"){ echo "selected"; } ?>>SURAT</option>
                        <option value="VAPI" <?php if($city=="VAPI"){ echo "selected"; } ?>>VAPI</option>
                        <option value="VALSAD" <?php if($city=="VALSAD"){ echo "selected"; } ?>>VALSAD</option>
                        <option value="NAVSARI" <?php if($city=="NAVSARI"){ echo "selected"; } ?>>NAVSARI</option>
                        <option value="AHEMDBAD" <?php if($city=="AHEMDBAD"){ echo "selected"; } ?>>AHEMDBAD</option>
                        <option value="OTHER" <?php if($city=="OTHER"){ echo "selected"; } ?>>OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select name="state" id="state">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="GUJARAT" <?php if($state=="GUJARAT"){ echo "selected"; } ?>>GUJARAT</option>
                        <option value="MAHARASHTRA" <?php if($state=="MAHARASHTRA"){ echo "selected"; } ?>>MAHARASHTRA</option>
                        <option value="MADHYA PRADESH" <?php if($state=="MADHYA PRADESH"){ echo "selected"; } ?>>MADHYA PRADESH</option>
                        <option value="UTTAR PRADESH" <?php if($state=="UTTAR PRADESH"){ echo "selected"; } ?>>UTTAR PRADESH</option>
                        <option value="OTHER" <?php if($state=="OTHER"){ echo "selected"; } ?>>OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="password" id="password" value="<?php echo $password ?>">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" id="submit" value="UPDATE">
    </form>
</center>
</body>
</html>
<?php
    require("config.php"); 
    // Fetch Data From Database
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
    }
    
    // Update with Vaildation
    $error = array();
    if(isset($_POST['submit'])){

        if(empty($_POST['fname'])){
            $error[] = "First name is required.";
        } else {
            $fname = $_POST['fname'];
            if(!preg_match ("/^[a-zA-z]*$/", $fname)){
                $error[] = "First name Only alphabets and whitespace are allowed."; 
            }
        }

        if(empty($_POST['lname'])){
            $error[] = "Last name is required.";
        } else {
            $lname = $_POST['lname'];
            if(!preg_match ("/^[a-zA-z]*$/", $lname)){
                $error[] = "Last name Only alphabets and whitespace are allowed."; 
            }
        }

        if(empty($_POST['date'])){
            $error[] = "Birth Date is required.";
        }

        if(empty($_POST['gender'])){
            $error[] = "Gender is required.";
        }

        if(empty($_POST['hobbies'])){
            $error[] = "Atleast one hobby is required.";
        } else {
            $hobbies = implode(',',$_POST['hobbies']);
        }

        if(empty($_POST['course'])){
            $error[] = "Course is required.";
        }

        if(empty($_POST['moblie'])){
            $error[] = "Moblie is required.";
        } else {
            $moblie = $_POST['moblie'];
            if (!preg_match ("/^[0-9]*$/", $moblie) ){
                $error[] = "In Mobile Only numbers are allowed.";
            } else {
                if(!preg_match('/^[0-9]{10}+$/', $moblie)){
                    $error[] = "In Mobile Only 10 Digits are allowed";
                }
            }
        }

        if(empty($_POST['address'])){
            $error[] = "Address is required.";
        } else {
            $address = $_POST['address'];
            if(empty(trim($address))){
                $error[] = "Address is required.";
            }
        }

        if(empty($_POST['pincode'])){
            $error[] = "Pin Code is required.";
        } else {
            $pincode = $_POST['pincode'];
            if (!preg_match ("/^[0-9]*$/", $pincode) ){
                $error[] = "Pin Code Only numbers are allowed.";
            } else {
                if(!preg_match('/^[0-9]{6}+$/', $pincode)){
                    $error[] = "Pin Code Only 6 Digits are allowed";
                }
            }
        }

        if(empty($_POST['city'])){
            $error[] = "City name is required.";
        }

        if(empty($_POST['state'])){
            $error[] = "State name is required.";
        }

        if(empty($_POST['password'])){
            $error[] = "Password is required.";
        } else {
            $password = $_POST['password'];
            if(strlen($password) < 8){
                $error[] = "Password should be at least 8 characters in length";
            } elseif(!preg_match('@[A-Z]@', $password)){
                $error[] = "Include at least one Upper case letter.";
            } elseif(!preg_match('@[a-z]@', $password)) {
                $error[] = "Include at least one Lower case letter.";
            } elseif(!preg_match('@[0-9]@', $password)) {
                $error[] = "Include at least one number.";
            } elseif(!preg_match('@[^\w]@', $password)) {
                $error[] = "Include at least one special character."; 
            } 
        }

        $count = count($error);
        if($count > 0){
            foreach ($error as $value) {
                echo "<center><p class='error'>".$value."</p></center>";
            }
        } else {
            echo $sql = "UPDATE regi_data SET fname='$fname',lname='$lname',date='$date',gender='$gender',hobbies='$hobbies',course='$course',moblie='$moblie',address='$address',pincode='$pincode',city='$city',state='$city',password='$password' WHERE id='$id'";
            $query = mysqli_query($conn,$sql);
            if($query){
                header("location: display_vaild.php");
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
    <style>
        .error{
            color: #ef1414;
        }
    </style>
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
                <td><input type="date" name="date" id="date" value="<?php echo $date ?>"></td>
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
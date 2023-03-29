<?php
    require("config.php");

    $error = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $date = $_POST['date'];
        if(isset($_POST['gender'])){$gender = $_POST['gender'];}
        if(isset($_POST['hobbies'])){$hobbies = implode(',',$_POST['hobbies']);}
        if(isset($_POST['course'])){$course = $_POST['course'];}
        $moblie = $_POST['moblie'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        if(isset($_POST['city'])){$city = $_POST['city'];}
        if(isset($_POST['state'])){$state = $_POST['state'];}
        $password = $_POST['password'];

        if(empty($fname)){
            $error[] = "First name is required.";
        } else {
            if(!preg_match ("/^[a-zA-z]*$/", $fname)){
                $error[] = "Only alphabets and whitespace are allowed."; 
            }
        }

        if(empty($lname)){
            $error[] = "Last name is required.";
        } else {
            if(!preg_match ("/^[a-zA-z]*$/", $lname)){
                $error[] = "Only alphabets and whitespace are allowed."; 
            }
        }

        if(empty($date)){
            $error[] = "Birth Date is required.";
        }

        if(empty($gender)){
            $error[] = "Gender is required.";
        }

        if(empty($hobbies)){
            $error[] = "Atleast one hobby is required.";
        }

        if(empty($course)){
            $error[] = "Course is required.";
        }

        if(empty($moblie)){
            $error[] = "Moblie is required.";
        } else {
            if (!preg_match ("/^[0-9]*$/", $moblie) ){
                $error[] = "Only digits are allowed.";
            } else {
                if(!preg_match('/^[0-9]{10}+$/', $moblie)){
                    $error[] = "Only 10 Digits are allowed";
                }
            }
        }

        if(empty($address)){
            $error[] = "Address is required.";
        }

        if(empty($pincode)){
            $error[] = "Pin Code is required.";
        } else {
            if (!preg_match ("/^[0-9]*$/", $pincode) ){
                $error[] = "Only digits are allowed.";
            } else {
                if(!preg_match('/^[0-9]{6}+$/', $pincode)){
                    $error[] = "Only 6 Digits are allowed";
                }
            }
        }

        if(empty($city)){
            $error[] = "City name is required.";
        }

        if(empty($state)){
            $error[] = "State name is required.";
        }

        if(empty($password)){
            $error[] = "Password is required.";
        } else {
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
            $sql = "INSERT INTO regi_data(fname, lname, date, gender, hobbies, course, moblie, address, pincode, city, state, password) VALUES ('$fname','$lname','$date','$gender','$hobbies','$course','$moblie','$address','$pincode','$city','$state','$password')";
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
    <title>Insert Vaild</title>
</head>
<body>
<center>
    <form action="" method="post" autocomplete="off">
        <h1>Registration Data</h1>
        <table border="1">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" id="fname"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" id="lname"></td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="date" name="date" id="date" max="<?php echo date("Y-m-d"); ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" id="gender" value="MALE">MALE
                    <input type="radio" name="gender" id="gender" value="FEMALE">FEMALE
                    <input type="radio" name="gender" id="gender" value="OTHER">OTHER
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td>
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="PLAYING">PLAYING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="CODING">CODING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="READING">READING
                    <input type="checkbox" name="hobbies[]" id="hobbies" value="OTHER">OTHER
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <select name="course" id="course">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="BCA">BCA</option>
                        <option value="BCOM">BCOM</option>
                        <option value="BBA">BBA</option>
                        <option value="BA">BA</option>
                        <option value="OTHER">OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Moblie No</td>
                <td><input type="text" name="moblie" id="moblie"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <textarea name="address" id="address" cols="20" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Pin Code</td>
                <td>
                    <input type="text" name="pincode" id="pincode">
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    <select name="city" id="city">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="SURAT">SURAT</option>
                        <option value="VAPI">VAPI</option>
                        <option value="VALSAD">VALSAD</option>
                        <option value="NAVSARI">NAVSARI</option>
                        <option value="AHEMDBAD">AHEMDBAD</option>
                        <option value="OTHER">OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select name="state" id="state">
                        <option value="" disabled selected>--SELECT--</option>
                        <option value="GUJARAT">GUJARAT</option>
                        <option value="MAHARASHTRA">MAHARASHTRA</option>
                        <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                        <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                        <option value="OTHER">OTHER</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="password" id="password">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" id="submit" value="INSERT">
        <a href="display_vaild.php"><input type="button" value="DISPLAY"></a>
    </form>
</center>
</body>
</html>
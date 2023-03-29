<?php
    require("config.php");
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $date = date('d-m-Y',strtotime($_POST['date']));
        $gender = $_POST['gender'];
        $hobbies = implode(',',$_POST['hobbies']);
        $course = $_POST['course'];
        $moblie = $_POST['moblie'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];

        $sql = "INSERT INTO regi_data(fname, lname, date, gender, hobbies, course, moblie, address, pincode, city, state, password) VALUES ('$fname','$lname','$date','$gender','$hobbies','$course','$moblie','$address','$pincode','$city','$state','$password')";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("location: display.php");
        } else {
            echo "Failed...!";
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
    <title>Registration</title>
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
                <td><input type="date" name="date" id="date"></td>
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
                    <input type="password" name="password" id="password">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" id="submit" value="INSERT">
    </form>
</center>
</body>
</html>
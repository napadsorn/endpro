<?php 
    session_start();
    require_once "connect.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $user_check = "SELECT * FROM login WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);
            $query = "INSERT INTO user (username, password, name, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: หน้าแรกแบบทั่วไป.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: หน้าแรกแบบทั่วไป.php");
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="file:///C|/Users/team3/Downloads/css/stylelogin.css">

</head>
<body>

    <form class= "box" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h1>ลงทะเบียน</h1>
        
        <input type="text" name="username" placeholder="Enter your username" required>
        
       
        <input type="password" name="password" placeholder="Enter your password" required>
        
      
        <input type="text" name="firstname" placeholder="Enter your firstname" required>
        

        <input type="text" name="lastname" placeholder="Enter your lastname" required>
        
        <input type="submit" name="ลงทะเบียน" value="ลงทะเบียน">
        <a href="หน้าแรกแบบทั่วไป.php">Go back to index</a>
    
    </form>

  
    
</body>
</html>
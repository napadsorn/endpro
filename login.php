<?php 
    session_start();
    if (isset($_POST['username'])) {
        include('connect.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        $query = "SELECT * FROM login WHERE username = '$username' AND password = '$passwordenc'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['name'] . " " . $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];
            if ($_SESSION['userlevel'] == 'a') {
                header("Location: หน้าแรกบุคลากร.php");
            }
            if ($_SESSION['userlevel'] == 'm') {
                header("Location: หน้าแรกบุคคลทั่วไป.php");
            }
        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
        }
    } /*else {
        header("Location: หน้าแรกแบบทั่วไป.php");
    }*/
?>
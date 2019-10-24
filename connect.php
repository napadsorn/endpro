<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
	$serverName = "localhost";
$userName ="root";
$userPassword = "";
$dbName = "project";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn,"utf8");
	
	/*function conndb() {
        global $conn;
        global $host;
        global $user;
        global $pass;
        global $dbname;
        $conn = mysql_connect($host,$user,$pass); */
if(mysqli_connect_errno())
{
echo"ไม่สามารถติดต่อได้" . mysqli_connect_error();
}
?>
	
</body>
</html>
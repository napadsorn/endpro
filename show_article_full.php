<!DOCTYPE html>
<?php  include "แถบเมนูแบบยังไม่ล็อกอิน.php";  ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<div class="content">
<?php
include 'connect.php';
 
$id_article = $_GET['id_project'];//รับค่า id_project
 
//$sql = "select * from data_project where id_project = '$id_article' order by id_project";
//$result = mysqli_query($sql);
	$result = mysqli_query($conn,"select * from data_project where id_project = '$id_article' order by id_project");
 
$row = mysqli_fetch_array($result);
$id_article = $row['id_project'];
$author = $row['leader'];
$title = $row['nameproject'];
$article = $row['detail'];
?>

<table>
<?php
echo "<tr>";
echo "<td>";
 

echo "<div id='nameproject'><h2>$title</h2></div>";	
echo "<div id='detail'>$article</div>";
echo "หัวหน้าทีมวิจัย <div id='leader'><h5>$author</h5></div>";
echo " <div id='float_r'><font color='#64711F'>Post By:</font>
$author</div>";
 
echo "</td>";
echo "</tr>";
?>
</table>
</div>
		
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>
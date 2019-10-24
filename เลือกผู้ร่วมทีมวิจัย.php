<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8 ">

<title>เลือกผู่ร่วมทีมวิจัย</title>

</head>
	<style>.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: #88BBAA; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}


	</style>

<body >

<?php
	//ตั้งค่าตัวแปรค้นหา
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
	
<p>&nbsp;</p>
<table border="1" align="center" width="1300">

	<tr bgcolor="#BEF1E4">
	<td width="32"><p align="center">ID</td>
    
	<td width="135"><p align="center">ชื่อ</td>
    
	<td width="108"><p align="center">นามสกุล</td>

	  <td width="170"><p align="center">ตำแหน่ง</td>

	  <td width="96"><p align="center">คณะสังกัด</td>
    
   	  <td width="159" bgcolor="#F3F7CF"><p align="center">เลือก</td>


	</tr>


<p align="center"><form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
		  <label for="search">ค้นหารายชื่อ </label>
          <input type="search" name="txtKeyword" id="txtKeyword" value="<?php echo $strKeyword;?>">
		  <input type="submit" value="Search">
        </p></form>
											 
        <?php

include"connect.php";



$sql = mysqli_query($conn,"SELECT * FROM login");

while($row = mysqli_fetch_assoc($sql)){ ?>
	<tr>
																

    <td><p align="center">  <?=$row['id']; ?> </p></td>

		
														
        <td><p align="center"> 		<?=$row['name']; ?>	</p></td>
        
			<td><p align="center"> 	<?=$row['lastname']; ?>	</td>
            
         <td><p align="center"><?=$row['position']; ?></td>
        

      <td> <p align="center"  > <?=$row['faculty']; ?></td>
        
        <td bgcolor="#F3F7CF">
        </a>
        
<p align="center"  >
  <input type="checkbox" name="checkbox" id="checkbox">
  <label for="checkbox">เลือก</label></td>

</tr>

<?php } ?>

</table>

<p align="center"  ><button class="button button1" name="button" id="button">ยืนยัน</button></p>

</body>

</html>
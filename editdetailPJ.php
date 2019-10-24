<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>KramDinDam.com</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<?php

//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
$request = $_REQUEST["id_project"];
 
//2. query ข้อมูลจากตาราง: 
    $sql = "SELECT * FROM data_project Where id_project = $request";
	$query = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
 

  ?>	

  
  <form action = "savedataupdate.php" name="FormAdd" method="post">

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"> <br />
      <h4 align="center"> ฟอร์มแก้ไขข้อมูลโครงการ </h4>
      <hr />
      <form action="savedata.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
		  
   <div class="form-group">
          <div class="col-sm-12">
            <p>ชื่อโครงการ</p>
            <p>
              <input type="text"  name="namepro" class="form-control" required placeholder="ชื่อโครงการ" ReadOnly="True" value="<?php echo $result["nameproject"];?>"/>				
              <br>       </p>   </div>        </div>   

 
        <div class="form-group">
          <div class="col-sm-12">
            <p> หัวหน้าทีมวิจัย</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="หัวหน้าทีมวิจัย"ReadOnly="True" value="<?php echo $result["leader"];?>"/>
          </div>  </div>
      
 
        <div class="form-group">
          <div class="col-sm-12">
            <p>รายละเอียดโครงการ</p>
            <p>
              <textarea  name="p_detail" class="form-control"  rows="20"  required placeholder="รายละเอียดโครงการ"></textarea>
            </p></div>  
			  
			  
			  <p> อำเภอเดิม</p>
            <input type="text"  name="where" class="form-control" required placeholder="อำเภแ" ReadOnly="True" value="<?php echo $result["district"];?>"/>
          <div class="form-group">
          <div class="col-sm-12">
            <p>เลือกอำเภอใหม่
              <label for="select">อำเภอ</label>
              <select name="where" >
                <option value="อำเภอกุดบาก">อำเภอกุดบาก</option>
				  <option value="อำเภอกุสุมาลย์">อำเภอกุสุมาลย์</option>
				  <option value="อำเภอโคกศรีสุพรรณ">อำเภอโคกศรีสุพรรณ</option>
				   <option value="อำเภอคำตากล้า">อำเภอคำตากล้า</option>
				   <option value="อำเภอเจริญศิลป์">อำเภอเจริญศิลป์</option>
				   <option value="อำเภอเต่างอย">อำเภอเต่างอย</option>
				   <option value="อำเภอนิคมน้ำอูน">อำเภอนิคมน้ำอูน</option>
				   <option value="อำเภอบ้านม่วง">อำเภอบ้านม่วง</option>
				   <option value="อำเภอโพนนาแก้ว">อำเภอโพนนาแก้ว</option>
				   <option value="อำเภอพรรณานิคม">อำเภอพรรณานิคม</option>
				   <option value="อำเภอพังโคน">อำเภอพังโคน</option>
				   <option value="อำเภอภูพาน">อำเภอภูพาน</option>
				   <option value="อำเภอเมืองสกลนคร">อำเภอเมืองสกลนคร</option>
				   <option value="อำเภอวาริชภูมิ">อำเภอวาริชภูมิ</option>
				   <option value="อำเภอสว่างแดนดิน">อำเภอสว่างแดนดิน</option>
				   <option value="อำเภอส่องดาว">อำเภอส่องดาว</option>
				   <option value="อำเภออากาศอำนวย">อำเภออากาศอำนวย</option>
				   <option value="อำเภอวานรนิวาส">อำเภอวานรนิวาส</option>
              </select>
			  </p> </div>  </div> 
			  
			  
            <p>สถานที่สำหรับเข้าร่วมงาน
               <input type="text" name="textfield2" rows="3" class="form-control" ReadOnly="True" value="<?php echo $result["location"];?>"/>
            </p>
          </div>
          <p>&nbsp;</p>
        </div>
        
            <p> ไอดีโปรเจค</p>
         <input type="text" name="txt_id" id="txt_sent_id"  style="width:60px; text-align:right;" ReadOnly="True" value="<?php echo $result["id_project"];?>"/>
          </div>  </div>
      
       
        <div class="form-group">
         <div class="col-sm-12">
          
            <button type="submit" class="btn btn-primary" name="submit"  value="submit"> บันทึกการแก้ไข </button>
            </div>

          <li class="nav-item">
          <div class="col-sm-12">
          
                              <a href="adminfrom.html"> กลับหน้าหลัก </a>
                          </li>
         

        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
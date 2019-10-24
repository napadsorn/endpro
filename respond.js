
		
$('#btnP').on('click',function(){ // เมื่อ Click ปุ๋ม เพิ่มรายการ
			var ddltype=$('#ddltype'); // ดึงเฉพาะ Element id คณะ
			var ddlsubtype=$('#ddlsubtype'); // ดึงเฉพาะ Element id สาขา
	        var ddlprod=$('#ddlprod'); // ดึงเฉพาะ Element id ชื่อ
			var Num=$('#txtNum').val(); // ค่าจำนวนนับ
			if(ddltype.val() != "" && ddlsubtype.val() !=  "" && ddlprod.val() != ""){ // เมื่อค่าจังหวัด และ ค่าท่องเที่ยว ไม่เท่ากับ ค่าว่าง
				$('tbody').append("<tr id='tr"+Num+"'><td>"+ddltype.find(':selected').text()+"<td>"+ddlsubtype.find(':selected').text()+"<td>"+ddlprod.find(':selected').text()+
								  "<input type='hidden' name='hdProvince_id[]' value='"+ddltype.val()+"'> <input type='hidden' name='hdTravel_id[]' value='"+ddlsubtype.val()+ "'><input type='hidden' name='hdTravel_id[]' value='"+ddlprod.val()+ "'><td><button onclick='Del("+Num+")'>-</button>"); 
				// เพิ่มรายละเอียดเข้าไปที่ tbody
				// ??.find(':selected').text() แสดงค่า Select Option ในช่อง Text
				// <input type='hidden' name='hd????[]' value=''> สร้าง Element แบบซ่อน โดยเก็บค่า id ที่เพิ่ม
				// <button onclick='Del("+Num+")'> สร้าง Element ปุ่ม เมื่อคลิก จะเข้าไปใน Function อ้างอิงจำนวนนับ 
				 
				$('#txtNum').val(parseInt(Num)+1); // ค่าจำนวนนับเดิม + 1
			}else{ 
				alert("กรุณาเลือกข้อมูลให้ครบถ้วน");	 // false
			}
		});
		
		$('#btnSubmit').click(function(){ // กด Click ปุ่ม Submit
			$('form').submit();	 // Form ทำการส่งค่า
		});
		
   // });
	
	function Del(Num){ // Function ลบตาราง อ้างอิงจาก id=BtnDel
		$('#tr'+Num).remove(); // ลบ tr ที่กำหนด
	}
// JavaScript Document
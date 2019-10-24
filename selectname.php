<!DOCTYPE html>

<html>
<head>
    <title>Dropdownlist Type Subtype</title>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	
	
</head>

<body>
<script src="respond.js"></script>
<form action="?act=test" method="post"> <!--ส่งค่า post ไปหน้าเดิม --></form>
	
    <div id="wrapper">        
       
            <!-- dropdownlist Type -->
            <div class="row">
                <div class="col-md-1"><label>คณะ</label></div>
                <div class="col-md-3">
                    <select id="ddltype" class="form-control" onchange="onTypeChange($(ddlsubtype),$(ddlprod));"></select>
                </div>
            
                <div class="col-md-1"><label>สาขาวิชา</label></div>
                <div class="col-md-3">
                    <select id="ddlsubtype" class="form-control" onchange="onSubtypeChange($(ddlprod));">
                        <option value="0"> --- โปรดเลือกสาขาวิชา --- </option>
                    </select>
                </div>            
            
                <div class="col-md-1"><label>ชื่อบุคลากร</label></div>
                <div class="col-md-3">
                    <select id="ddlprod" class="form-control">
                        <option value="0"> --- โปรดเลือกชื่อบุคลากรผู้ร่วมทีมวิจัย --- </option>
                    </select>
                
            </div></div> 
      <p align="center"  > 
	  <input type="button" name="button" id="btnP" value="เพิ่มรายชื่อผู้ร่วมวิจัย" 
		onclick="insertAjax(document.getElementById('ddltype').value, document.getElementById('ddlsubtype').value, document.getElementById('ddlprod').value);"></p>       
		<tr><td colspan="3"><center>รายการที่เพิ่ม</center></td></tr>
          </div>    
		  <div id=table_selected align=center  class="col-md-12">
		  </div>
               
   
	<script>
		function deleteAjax(deleteID) {
            $.ajax({
                type        : "GET" ,
                url         : "pera/delete_teacher.php" ,
				data        : { Sval_1 : deleteID } ,
                success     : function(data) {
                    if (data.output != false) {
                        alert('data deleted'); alert('data queried'); alert(data);
						var array = data.split("|");
						table_output_header = "<table border=1>"
												+"<tr>"
												+"<td>ลำดับที่"
												+"</td>"
												+"<td>คณะ"
												+"</td>"
												+"<td>สาขา"
												+"</td>"
												+"<td>อาจารย์"
												+"</td>"
												+"<td>Action"
												+"</td>"
												+"</tr>";
												
						table_output_footer = "</table>";
						
						var table_output_body = '';
						for(var i=0; i<(Math.floor(array.length/4)); i++){
						  table_output_body += "<tr>"
										+"<td>"+array[(i*4)+0]
										+"</td>"
										+"<td>"+array[(i*4)+1]
										+"</td>"
										+"<td>"+array[(i*4)+2]
										+"</td>"
										+"<td>"+array[(i*4)+3]
										+"</td>"
										+"<td onclick=\"alert('xDeleted'); deleteAjax("+array[(i*4)+0]+"); \">ลบ"
										+"</td>"
										+"</tr>";
						  
						}
						document.getElementById("table_selected").innerHTML = table_output_header+table_output_body+table_output_footer;
                    }
                },
                error       : function(data) {
                    console.log( data.statusText + '\n' + data.responseText);
					alert(data.responseText); 
                }
            });
        }
		function insertAjax(val_1,val_2,val_3) {
            $.ajax({
                type        : "GET" ,
                url         : "pera/insert_teacher.php" ,
				data        : { Sval_1 : val_1 , Sval_2 : val_2 , Sval_3 : val_3 } ,
				//dataType    : "json" ,
                success     : function(data) {
                    if (data.output != false) {
                        alert('data inserted'); alert('data queried'); alert(data);
						var array = data.split("|");
						table_output_header = "<table border=1>"
												+"<tr>"
												+"<td>ลำดับที่"
												+"</td>"
												+"<td>คณะ"
												+"</td>"
												+"<td>สาขา"
												+"</td>"
												+"<td>อาจารย์"
												+"</td>"
												+"<td>Action"
												+"</td>"
												+"</tr>";
												
						table_output_footer = "</table>";
						
						var table_output_body = '';
						for(var i=0; i<(Math.floor(array.length/4)); i++){
							var fac = array[(i*4)+1];
							table_output_body += "<tr>"
										+"<td>"+array[(i*4)+0]
										+"</td>"
										+"<td>"+array[(i*4)+1]
										+"</td>"
										+"<td>"+array[(i*4)+2]
										+"</td>"
										+"<td>"+array[(i*4)+3]
										+"</td>"
										+"<td onclick=\"alert('yDeleted'); deleteAjax("+array[(i*4)+0]+");\">ลบ"
										+"</td>"
										+"</tr>";
						  
						}
						document.getElementById("table_selected").innerHTML = table_output_header+table_output_body+table_output_footer;
                    }
                },
                error       : function(data) {
                    console.log( data.statusText + '\n' + data.responseText);
					alert(data.responseText); 
                }
            });
        }
	</script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            // on page loaded
            callAjax("faculty","","",$("#ddltype"));
        });
        function onTypeChange(ddlsubtypeobj,ddlprodobj) {
            callAjax("sakawicha",$("#ddltype").val(),"",ddlsubtypeobj);            
            clearOptionItem(ddlprodobj)
        }
        function onSubtypeChange(ddlprodobj) {
            callAjax("nameperson",$("#ddltype").val(),$("#ddlsubtype").val(),ddlprodobj);
        }
        function clearOptionItem(ddlobj) {
            $(ddlobj).find("option").remove().end();
            $(ddlobj).append("<option value='0'> --- Please select item --- </option>");
        }
        function callAjax(s_mode,s_facid,s_sakaid,ddlobj) {
            $.ajax({
                type        : "GET" ,
                url         : "gen_datasource.php" ,
                data        : { mode : s_mode , fac_id : s_facid , saka_id : s_sakaid } ,
                dataType    : "json" ,
                success     : function(data) {
                    if (data.output != false) {
                        $(ddlobj).find("option").remove().end();
                        var option_val = data.output.split("|");                        
                        for (j = 0 ;  j < option_val.length ; j++) {
                            $(ddlobj).append(option_val[j]);
                        }
                    }
                },
                error       : function(data) {
                    console.log( data.statusText + '\n' + data.responseText);
                }
            });
        }
    </script>
</body>
</html>

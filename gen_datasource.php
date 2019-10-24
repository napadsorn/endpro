<?php
    header("Content-Type: text/plain; charset=UTF-8");
    
    // config connect database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "project";
    
    // defind variable
    $get_status = false;
    $get_msg = "";
    
    // get parameter
    if (isset($_GET["mode"]) == true) { $mode = $_GET["mode"]; }
    if (isset($_GET["fac_id"]) == true) { $fac_id = $_GET["fac_id"]; }
    if (isset($_GET["saka_id"]) == true) { $saka_id = $_GET["saka_id"]; }
    
    // connect db
    $conni = new mysqli($host, $user, $pass, $db);
    ck_condb($conni,$get_status,$get_msg);
    
    if ($get_status == false) {
        die($get_msg);
        
    } else {
        mysqli_set_charset($conni,"utf8"); // config mysql charactor encode with utf8
        
        switch ($mode) {
            case "faculty" :
                $query_str = "SELECT fac_id,fac_name FROM faculty ORDER BY fac_id"; 
                if ($result = $conni->query($query_str)) {                  
                    // create option item
                    $output = "<option value='0'> --- โปรดเลือกคณะ ---</option>";
                    while ($row = $result->fetch_object()) {
                        $output .= "<option value=" . $row->fac_id . ">".$row->fac_name."</option>"."|" ;
                    }     
                }
                break;
            
            case "sakawicha" :
                $query_str = "SELECT saka_id,saka_name FROM sakawicha WHERE fac_id='".$fac_id."' ORDER BY saka_id";
                if ($result = $conni->query($query_str)) {                    
                    // create option item
                    $output = "<option value='0'> --- โปรดเลือกสาขาวิชา--- </option>"."|";
                    while ($row = $result->fetch_object()) {
                        $output .= "<option value=".$row->saka_id.">".$row->saka_name."</option>"."|";
                    }                                            
                }
                break;
            
            case "nameperson" :
                $query_str = "SELECT person_id,name FROM nameinsaka WHERE fac_id='".$fac_id."' AND saka_id='".$saka_id."' ORDER BY person_id";
                if ($result = $conni->query($query_str)) {                    
                    // create option item
                    $output = "<option value='0'> --- โปรดเลือกรายชื่อบุคลากร --- </option>"."|";
                    while ($row = $result->fetch_object()) {
                        $output .= "<option value=".$row->person_id.">".$row->name."</option>"."|";
                    }                                            
                }
                break;
        }
        $output = substr($output,0,-1);
        $result->close(); // free result set
        $conni->close(); // disconnect db
                    
        echo json_encode(array("status" => true, "output" => $output));
    }

    function ck_condb($objdb,&$return_status,&$return_msg) {
        if ($objdb->connect_error) {
            $return_status = false;
            $return_msg = "connect fail -> ".mysqli_connect_errno(); // get error nubmer
            return;
        } else {
            $return_status = true;
            $return_msg = "";
        }
    }
?>
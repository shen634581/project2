<?php
// {"id":"xxx", "state": "xx"}

// {"state" : true, "message" : "更新成功"}
// {"state" : false, "message" : "更新失敗和錯誤代碼等"}
// {"state" : false, "message" : "欄位不得為空白"}
// {"state" : false, "message" : "欄位命名錯誤"}
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["id"]) && isset($mydata["state"])){
    if ($mydata["id"] != "" && $mydata["state"] != "") {
        $p_id = $mydata["id"];
        $p_state = $mydata["state"];
        require_once("dbtools.php");
        $link = create_connection();

        $sql = "UPDATE car SET State = '$p_state' WHERE id = '$p_id'";

       
     
        if( execute_sql($link, "dwarrior", $sql)){
            echo '{"state" : true,"message" : "訂單已更新"}';
        }else{
            
            echo '{"state" : false, "message" : "訂單更新失敗和錯誤代碼等"}';
        }
        mysqli_close($link);
           
       
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}
?>
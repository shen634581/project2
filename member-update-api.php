<?php
// {"id":"xxx", "email": "owner@test.com","password":""}

// {"state" : true, "message" : "更新成功"}
// {"state" : false, "message" : "更新失敗和錯誤代碼等"}
// {"state" : false, "message" : "欄位不得為空白"}
// {"state" : false, "message" : "欄位命名錯誤"}
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["id"]) && isset($mydata["email"]) && isset($mydata["password"])){
    if ($mydata["id"] != "" && $mydata["email"] != ""  && $mydata["password"] != "") {
        $p_id = $mydata["id"];
        $p_email = $mydata["email"];
        $p_password = password_hash($mydata["password"],PASSWORD_DEFAULT);
        require_once("dbtools.php");
        $link = create_connection();

        $sql = "UPDATE member SET Email = '$p_email',password='$p_password' WHERE id = '$p_id'";

       
     
        if( execute_sql($link, "dwarrior", $sql)){
            echo '{"state" : true,"message" : "更新成功"}';
        }else{
            
            echo '{"state" : false, "message" : "更新失敗和錯誤代碼等"}';
        }
        mysqli_close($link);
           
       
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}
?>
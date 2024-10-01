<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["id"]) && isset($mydata["state"])) {
    if ($mydata["id"] != "" && $mydata["state"] != "") {
        if ($mydata["state"] == "0" || $mydata["state"] == "1") {
            $p_id = $mydata["id"];
            $p_state = $mydata["state"];

            require_once("dbtools.php");
            $link = create_connection();

            $sql = "UPDATE product SET state = '$p_state' WHERE id = '$p_id'";
            if (execute_sql($link, "dwarrior", $sql)) {
                echo '{"state" : true,"message" : "產品狀態更新成功"}';
            } else {
                echo '{"state" : false, "message" : "產品狀態更新失敗"}';
            }

            mysqli_close($link);
        } else {
            echo '{"state" : false, "message" : "產品狀態不得為0或1以外的字"}';
        }
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}

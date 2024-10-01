<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "" && $mydata["email"] != "") {
        $p_username = $mydata["username"];
        //password_hash("1234567",PASSWORD_DEFAULT);
        //$p_password = $mydata["password"];
        $p_password = password_hash($mydata["password"], PASSWORD_DEFAULT);
        $p_email    = $mydata["email"];

        require_once("dbtools1.php");
        $link = create_connection();
        $stmt = $link->prepare("INSERT INTO member(Username, Password, Email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $p_username, $p_password, $p_email); // 綁定參數，"sss" 表示三個字串參數
        if ($stmt->execute()) {
            echo '{"state" : true, "message" : "註冊成功"}';
        } else {
            echo '{"state" : false, "message" : "註冊失敗"}';
        }
        $stmt->close();
        mysqli_close($link);
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}

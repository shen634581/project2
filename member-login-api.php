<?php
// {"username":"owner01", "password":"123456"}

// {"state" : true, "message" : "登入成功"}
// {"state" : false, "message" : "登入失敗和錯誤代碼等"}
// {"state" : false, "message" : "欄位不得為空白"}
// {"state" : false, "message" : "欄位命名錯誤"}
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["username"]) && ($mydata["password"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "") {
        $p_username = $mydata["username"];
        $p_password = $mydata["password"];
        require_once("dbtools.php");
        $link = create_connection();
        //1.確認帳號是否存在
        //2.確認密碼是否正確 password_verif()
        $sql = "SELECT Username,Password FROM member WHERE Username ='$p_username'";

        $result = execute_sql($link, "dwarrior", $sql);

        if (mysqli_num_rows($result) == 1) {
            //帳號存在繼續比對密碼
            $row = mysqli_fetch_assoc($result);
            //echo $row["Password"];
            if (password_verify($p_password, $row["Password"])) {
                //密碼比對正確，產生uid01並更新至資料
                $uid01 = substr(hash('sha256', uniqid(time())),0,8);
                $sql = "UPDATE member SET Uid01 = '$uid01' WHERE Username ='$p_username'";
                if (execute_sql($link, "dwarrior", $sql)) {
                    //uid01更新成功
                    $sql = "SELECT Username,Email,Created_at,State,Uid01,Level FROM member WHERE Username ='$p_username'";
                    $result = execute_sql($link, "dwarrior", $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '{"state" : true ,"data" : ' . json_encode($row) . ' ,"message" : "登入成功"}';
                } else {
                    echo '{"state" : false, "message" : "uid更新失敗"}';
                }
            } else {
                echo '{"state" : false, "message" : "密碼錯誤"}';
            }
        } else {
            //帳號不存在, 登入失敗
            echo '{"state" : false, "message" : "帳號不存在"}';
        }
        mysqli_close($link);
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}
?>
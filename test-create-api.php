<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"]) && isset($mydata["hobby"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "" && $mydata["email"] != "" && $mydata["hobby"] != "") {
        $p_username = $mydata["username"];
        //password_hash("1234567",PASSWORD_DEFAULT);
        //$p_password = $mydata["password"];
        $p_password = $mydata["password"];
        $p_email    = $mydata["email"];
        if (is_array($mydata["hobby"])) {
            // 選擇其中一種格式進行存儲：
            
            // 1. 如果想要將 hobby 存為 JSON 格式
            $p_hobby = json_encode($mydata["hobby"]); // JSON 格式
            
            // 2. 如果想要將 hobby 存為逗號分隔字串
             $p_hobby = implode(",", $mydata["hobby"]); // 逗號分隔字串
        } else {
            // 如果 hobby 不是陣列，則視為無效資料
            echo '{"state" : false, "message" : "興趣資料格式錯誤"}';
            
        };
        require_once("tstools.php");
            $link = create_connection();
            $sql = "INSERT INTO test(Member, Password, Email, Hobby) VALUES('$p_username', '$p_password', '$p_email','$p_hobby')";
            if(execute_sql($link, "test1", $sql)){
                echo '{"state" : true, "message" : "註冊成功"}';
            }else{
                echo '{"state" : false, "message" : "註冊失敗"}';
            }
            mysqli_close($link);
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}
?>
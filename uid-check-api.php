<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["Uid01"]) ) {
    if ($mydata["Uid01"] != "" ) {
        $p_uid01 = $mydata["Uid01"];
        require_once("dbtools.php");
        $link = create_connection();

        $sql = "SELECT Username, Email, Uid01, State, Level,Product_progress,Product_returns,	Created_at FROM member WHERE Uid01 ='$p_uid01'";

        $result=execute_sql($link, "dwarrior", $sql);
     
        if(mysqli_num_rows($result) == 1){
            //帳號不存在, 可以使用
            $row = mysqli_fetch_assoc($result);
            echo json_encode([
                "state" => true,
                "data" => $row,
                "message" => "驗證成功，已登入"
            ]);
        }else{
            //帳號已存在, 不可以使用
            echo json_encode([
                "state" => false,
                "message" => "驗證失敗，未登入"
            ]);
        }
        mysqli_close($link);
           
       
    } else {
        echo json_encode([
            "state" => false,
            "message" => "欄位不得為空白"
        ]);
    }
} else {
    echo json_encode([
        "state" => false,
        "message" => "欄位命名錯誤"
    ]);
}
?>
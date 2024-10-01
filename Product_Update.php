<?php
// 確認資料符合規範
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["id"]) && isset($mydata["productName"]) && isset($mydata["photo"]) && isset($mydata["color"]) && isset($mydata["num"]) && isset($mydata["price"])) {

    if (
        $mydata["id"] != "" && $mydata["productName"] != "" && $mydata["photo"] != "" && $mydata["color"] != "" && $mydata["num"] != "" && $mydata["price"] != ""
    ) {

        $p_id = $mydata["id"];
        $p_name = $mydata["productName"];
        $p_photo = $mydata["photo"];
        $p_color = $mydata["color"];
        $p_num = $mydata["num"];
        $p_price = $mydata["price"];

        $servername = "localhost";
        $username = "root";
        $pwd = "";
        $dbname = "dwarrior";

        // 建立連線
        $conn = mysqli_connect($servername, $username, $pwd, $dbname);

        if (!$conn) {
            die("Link Error" . mysqli_connect_error());
        }

        // 更新資料
        $sql = "UPDATE product SET productName = '$p_name', photo = '$p_photo', color = '$p_color', num = '$p_num', price = '$p_price' WHERE id = '$p_id'";
        if (mysqli_query($conn, $sql)) {
            echo '{"state" : "true", "message" : "產品更新成功"}';
        } else {
            echo '{"state":"false", "message":"更新失敗：' . mysqli_error($conn) . '"}';
        }

        mysqli_close($conn);
    } else {
        echo '{"state" : "false", "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : "false", "message" : "欄位命名錯誤"}';
}

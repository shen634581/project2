<?php
// {"name":"雞腿飯", "price":"100", "num":"2", "remark":"好吃"}
// 確認資料符合規範
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true); // json轉陣列

// 判斷欄位格式是否正確
if (isset($mydata["productId"]) && isset($mydata["productName"]) && isset($mydata["photo"]) && isset($mydata["color"]) && isset($mydata["num"]) && isset($mydata["price"])) {

    // 判斷欄位內容是否空值
    if ($mydata["productId"] != "" && $mydata["productName"] != "" && $mydata["photo"] != "" && $mydata["color"] != "" && $mydata["num"] != "" && $mydata["price"] != "") {

        $p_productId = $mydata["productId"];
        $p_name = $mydata["productName"];
        $p_photo =  $mydata["photo"];
        $p_color =  $mydata["color"];
        $p_num =  $mydata["num"];
        $p_price =  $mydata["price"];

        $servername = "localhost";
        $username = "root";
        $pwd = "";
        $dbname = "dwarrior";

        // 建立連線
        $conn = mysqli_connect($servername, $username, $pwd, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }

        // 新增資料
        $sql = "INSERT INTO product(productId, productName, photo, color, num, price) VALUE('$p_productId', '$p_name', '$p_photo', '$p_color', '$p_num', '$p_price')";
        if (mysqli_query($conn, $sql)) {
            echo '{"state":"true", "message":"產品新增成功!"}';
        } else {
            echo '{"state":"false", "message":"產品新增失敗!' . $sql . mysqli_error($conn) . '"}';
        }

        // 關閉連線
        mysqli_close($conn);
    } else {
        echo '{"state":"false", "message":"欄位不得為空白}';
    }
} else {
    echo '{"state":"false", "message":"欄位命名錯誤}';
}

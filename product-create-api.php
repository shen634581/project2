<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["productId"]) && isset($mydata["productName"]) && isset($mydata["photo"]) && isset($mydata["color"]) && isset($mydata["num"]) && isset($mydata["price"])) {
    if ($mydata["productId"] != "" && $mydata["productName"] != "" && $mydata["photo"] != "" && $mydata["color"] != "" && $mydata["num"] != "" && $mydata["price"] != "") {

        //password_hash("1234567",PASSWORD_DEFAULT);
        //$p_password = $mydata["password"];
        $p_productid = $mydata["productId"];
        $p_username = $mydata["productName"];
        $p_photo = $mydata["photo"];
        $p_color = $mydata["color"];
        $p_num = $mydata["num"];
        $p_price = $mydata["price"];

        require_once("Product_Read.php");
        $link = create_connection();
        $stmt = $link->prepare("INSERT INTO product(productId, productName, photo, color, num, price) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $p_productid, $p_username, $p_photo, $p_color, $p_num, $p_price); // 綁定參數，"sss" 表示三個字串參數
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

<?php
$data = file_get_contents("php://input");
$mydata = json_decode($data, true);  // 將 JSON 資料轉為陣列

if (isset($mydata["memberId"]) && isset($mydata["items"])) {
    $p_username = $mydata["memberId"];
    $items = $mydata["items"];  // 獲取 items 內的商品

    require_once("dbtools.php");
    $link = create_connection();
    $all_success = true;  // 用於追踪是否所有商品都成功添加

    // 迭代每個商品
    foreach ($items as $item) {
        if (isset($item["name"]) && isset($item["quantity"]) && isset($item["price"])) {
            $p_product = $item["name"];
            $p_num = $item["quantity"];
            $p_price = $item["price"];

            if ($p_product != "" && $p_num != "" && $p_price != "") {
                $sql = "INSERT INTO car(Username, Product, Num, Price) VALUES('$p_username', '$p_product', '$p_num', '$p_price')";
                if (!execute_sql($link, "dwarrior", $sql)) {
                    $all_success = false;
                    break;  // 如果失敗，跳出循環
                }
            } else {
                echo '{"state" : false, "message" : "商品資料不得為空白"}';
                mysqli_close($link);
                exit;
            }
        } else {
            echo '{"state" : false, "message" : "商品資料欄位命名錯誤"}';
            mysqli_close($link);
            exit;
        }
    }

    if ($all_success) {
        echo '{"state" : true, "message" : "所有商品添加成功"}';
    } else {
        echo '{"state" : false, "message" : "添加商品失敗"}';
    }

    mysqli_close($link);
} else {
    echo '{"state" : false, "message" : "會員ID或商品資料缺失"}';
}

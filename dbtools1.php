<?php
function create_connection()
{
    $servername = "localhost";
    $username = "owner";
    $password = "123456";
    $dbname = "dwarrior"; // 替換為你的資料庫名稱

    // 創建資料庫連接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連線失敗: " . $conn->connect_error);
    }

    return $conn;
}

function execute_sql($link, $sql)
{
    // 執行 SQL 查詢
    $result = $link->query($sql);

    // 檢查查詢是否成功
    if (!$result) {
        die("查詢失敗: " . $link->error);
    }

    return $result;
}
?>
<?php
// 顯示檔案資訊 (除錯用)
// echo $_FILES['file']['name'] . '<br>';
// echo $_FILES['file']['type'] . '<br>';
// echo $_FILES['file']['size'] . '<br>';
// echo $_FILES['file']['tmp_name'] . '<br>';

// 檢查檔案類型是否為 JPEG 或 PNG
if (
    $_FILES['file']['type'] == 'image/jpeg' ||
    $_FILES['file']['type'] == 'image/png' ||
    $_FILES['file']['type'] == 'image/jpg' ||
    $_FILES['file']['type'] == 'image/pjpeg' ||
    $_FILES['file']['type'] == 'image/x-png'
   ) {
    // 產生獨一無二的檔案名稱，以當前日期時間為基礎
    $filename = date("YmdHis") . "_" . $_FILES['file']['name'];
    // 設定檔案儲存位置
    $location = "images_upload/" . $filename;
    // 
    // 將檔案從暫存目錄移動到指定位置
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        // 上傳成功時，準備回傳的檔案資訊
        $dataInfo = array();
        $dataInfo["原始檔案名稱"] = $_FILES['file']['name'];
        $dataInfo["儲存檔案名稱"] = $filename;
        $dataInfo["檔案格式"] = $_FILES['file']['type'];
        $dataInfo["檔案大小"] = $_FILES['file']['size'];

        // 以 JSON 格式回傳成功訊息及檔案資訊
        echo '{"state" : true, "dataInfo": ' . json_encode($dataInfo) . ',"message" : "上傳成功"}';
    } else {
        // 上傳失敗時回傳錯誤訊息
        echo '{"state" : false,"message" : "上傳失敗"}';
    }
} else {
    // 檔案類型不符合規定時回傳錯誤訊息
    echo '{"state" : false,"message" : "檔案類型不符規定"}';
}

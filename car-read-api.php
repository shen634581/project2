<?php
// {"state" : true, "data": "所有會員", "message" :"讀取會員資料成功!"}
//     {"state" : false, "message" : "會員讀取失敗!"}


require_once("dbtools.php");
$link = create_connection();
//遞增 ASC 遞減DESC 
$sql = "SELECT id ,Username,Product,Num,Creat_at,Price,State FROM car ORDER BY Creat_at ASC";
$result = execute_sql($link, "dwarrior", $sql);
$mydata=array();
while($row=mysqli_fetch_assoc($result)){
    $mydata[]=$row;
}
echo'{"state" : true, "data":' .json_encode($mydata). ', "message" :"讀取購物車資料成功!"}';
mysqli_close($link);
?>
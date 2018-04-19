<?php

function cmdDb($insert_command){
    include('connect.php');
    $connect->set_charset("utf8");
    return mysqli_query($connect,$insert_command);/** สำหรับ เพิ่มข้อมูลเข้าฐานข้อมูล  */
     
}
function num_I($data){
    return mysqli_num_rows($data);
}
function logout(){
    session_destroy();
}



?>
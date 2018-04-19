<?php
$connect = mysqli_connect('localhost','root','','income');
if($connect){
   return $connect;
}else{
    exit();
    return null;
}


?>
<?php
include('../../config/MainModules.php');
?>
<?php
$url =  "{$_SERVER['REQUEST_URI']}";

$e_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Pages View for all</title>
    <base href="/income/">
    <?php include('../../public/style/scriptCss.html') ?>
   <?php include('../../public/javascript/scriptJs.html'); ?>
    
</head>
<body>
<?php include('../nav/userNav.php'); ?>
    
<div class="container-fluid ">
    <div class="row">
        <div class="p-3 col-2 d-none d-md-block bg-light sidebar">
            <div class="list_admin">
                <img  src="public/img/list.png" alt="">
            </div>
            <nav class='navAdmin'>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="pages/adminpage/layout.php?pages=dashboard">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminpage/layout.php?pages=insertData">เพิ่มรายการรายรับรายจ่าย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminpage/layout.php?pages=insertNeed">เพิ่มสิ่งที่อยากได้</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminpage/layout.php?pages=insertSubtype">เพิ่มประเภทย่อย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminpage/layout.php?pages=userSeting">ข้อมูลสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminpage/layout.php?index.php">กลับไปหน้าหลัก</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" >
            <?php 
                $now_p = null;
                $url =  "{$_SERVER['REQUEST_URI']}";
            
                
                if(isset($_GET['pages'])){
                    $get = $_GET['pages'];
                    switch($get){
                        case "userSeting" :
                            $now_p = "../setting/userSeting.php";
                            break;
                        case "insertSubtype" : 
                            $now_p = "../setting/insertSubtype.php";
                            break;
                        case "insertNeed": 
                            $now_p = "../income/insertNeed.php";
                            break;
                        case "insertData": 
                            $now_p = "../income/insertData.php";
                            break;
                        case "dashboard": 
                            $now_p = "../income/dashboard.php";
                            break;
                        case "viewData": 
                            $now_p = "../income/viewData.php";
                            break;
                    }


                    include_once($now_p);
                    
                }else{
                    header('Location:/income/');
                }

            ?>

        </main>
    </div>
</div>
    
</body>
</html>
<?php
session_start();

if(empty($_SESSION['user'])) header('Location:/income/');


include('../../config/MainModules.php');
?>
<?php
function isP($is){
    return isset($_POST[$is]);
}
function unP($un){
    unset($_POST[$un]);
}
$url =  "{$_SERVER['REQUEST_URI']}";
$user_f = json_decode($_SESSION['user']);
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
<div class="list_admin" id='list_show'>
                <img  src="public/img/list.png" alt="">  
            </div>   
    <div class="row" >
        <div class="p-3 col-7 col-md-2 das bg-light " >
        <a class="navbar-brand" style='color:rgb(227, 24, 10)' href='/income/index.php'>
      <img src="public/img/logo.png" width="64px" alt="">
      <small style='color:red;'>รายรับรายจ่าย</small>
    </a>    
            <p class='text-right close close-s text-danger'><i class='far fa-times-circle' ></i></p>
            <nav class=''>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="pages/adminpage/layout.php?pages=dashboard">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="pages/adminpage/layout.php?pages=insertData">เพิ่มรายการรายรับรายจ่าย</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " id='aa' href="pages/adminpage/layout.php?pages=insertNeed">เพิ่มสิ่งที่อยากได้</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="pages/adminpage/layout.php?pages=viewData">ดูรายการรายรับ/จ่าย</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="pages/adminpage/layout.php?pages=insertSubtype">เพิ่มประเภทย่อย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="pages/adminpage/layout.php?pages=userSeting">ข้อมูลสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id='aa' href="index.php">กลับไปหน้าหลัก</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" >
            <?php 
                $now_p = null;
               
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
    <script >
        let href_now = window.location.href.split(/[&+]/);
        var elms = document.querySelectorAll("[id='aa']"); 
       
        for(let i = 0 ; i < elms.length; i ++ ){
            if(href_now[0] == elms[i]){
                $(elms[i]).addClass('active');
            }
           
        }
       
        $('#list_show').click(()=>{
           $('.das').css('display','block');
           
        })
        $('.close-s').click(()=>{
           $('.das').hide();
            
        })


    </script>
</body>
</html>
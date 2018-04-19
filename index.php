<?php
include('config/MainModules.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include('public/style/scriptCss.html') ?>
    <base href="/income/">
    <script>
        function page_signUp(){
            window.location = '/income/pages/auth/signup.php';
        }
    </script>
</head>
<body>
    <?php include('pages/nav/nav.php') ?>

    <div class="container">
    <div class=" btn-black ">
    <div class="container ">
        <div class="col-12 p-3 " style='margin:auto'>
        
            <div class="col-12 col-md-6 text-center p-3" style='margin:auto'>
                <img src="public/img/logo.png" width="240px" alt="">
                <h3 style='color:red;padding:10px;'>รายรับ รายจ่าย</h3>
               <p class='text-left'>
                    รายการรายรับรายจ่าย ช่วยประกอบการวางแผนในการทำงานหรือในการใช้จ่ายเงิน ช่วยทำให้ทราบปัญหาในการใช้จ่ายว่าใช้ส่วนไหนเยอะที่สุด และคำนึงถึงความจำเป็นในการเสียเงินในส่วนนั้นๆ ว่าจำเป็นมากแคไหนในการ จ่าย และถ้าไม่จำเป็นเราจะได้ลดการใช้จ่ายในส่วนที่ไม่จำเป็นออก เพื่อใช้เงินก้อนนี้สำหรับเพิ่ม ไปยังส่วนที่จำเป็น จริงๆ


               </p>
               <button type="submit" onclick='page_signUp()'  class="btn  btn-lg btn-home">สมัครใช้งาน</button>
            </div>
        </div>
    </div>
</div>

<div class="container bb" >

    


    <div class=" p-3" style='margin-top:5px;'>

        <div class="container">
            <div class="col-12 p-3">
    
    
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h3 style='color:red;' class='text-center'>รายรับ รายจ่าย</h3>
                        <p class='p-3' style='width:100%;margin:auto'>
                            การทำบัญชีรายรับ รายจ่าย สามารถใช้ได้ในหลายกรณี ไม่ว่าจะเป็น บัญชีรายรับ รายจ่าย ในครัวเรือน หรือ อาจะทำไว้ใช้สำหรับในธุรกิจ เพื่อดูว่า รายการในต้องลด หรือ รายการไหนต้องเพิ่้ม หรือได้กำไรเท่าไหร่ ขาดทุนหรือไม่
                            หรือใช้ในการเก็บเงิน เพื่อจะซื้อสินค้าที่ต้องการ และดูว่าเราควรจะซื้อ ในตอนนี้หรือไม่ หรืออาจจะเก็บเงินไว้ใช้ในส่วนที่จำเป็นก่อน หากเราทำบัญชีรายรับ รายจ่าย เราก็สามารถมาประเมินความพร้อมในการซื้อของสิ่งนี้ได้ ว่ามีความพร้อมแค่ไหนในการใช้จ่าย ถ้าพร้อมก็ซื้อ ถ้าไม่ก็เก็ยไว้ก่อน
    
                        </p>
                    </div>
                    <div class="col-12 col-md-4" style='margin:0 auto'>
                        <img src="public/img/photo1.png" style='width:100%;' alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" p-3" style='margin-top:5px;'>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 text-center" style='margin:0 auto'>
                        <img src="public/img/html_img.gif" style='width:100%;border-radius:50%' alt="">
                    </div>
                    <div class="col-12 col-md-8 text-right">
                        <h3 style='color:red'  class='text-center'>เก็บเงินซื้อของในฝัน</h3>
                        <p class='p-3' style='width:100%;margin:auto'>
                            เมื่อมีเงินเหลือเก็บในส่วนของรายรับที่เข้ามา คุณก็จะสามารดูรายการของเว็ปไซต์เราได้ ว่ามีเงินเหลือเท่านี้ บวกกกับ เมื่อเดือนก่อนพอที่จะซื้อสินค้าที่อยากได้ๆ หรือไม่ หรือ จะสามารถนำเงินไปลงทุนได้หรือไม่ หรืออาจจะเก็บไว้เชยๆ ก็ได้
                        </p>
                    </div>
                </div>
        
            </div>
        </div>
    <div class=" p-3" >
        <div class="container">
            <div class="row">
                   
                <div class="col-12 col-md-8" style='margin:0 auto'>
                        <h3 style='color:red'  class='text-center'>บันทึกรายการทุกรายการ</h3>
                        <p class='p-3' style='width:100%;margin:auto'>
                            บันทึกทุกรายการ ที่ผ่านเข้ามาในชีวิต เพื่อทำการระบุบว่าในหนึ่งวัน หนึ่งเดือน หรือ หนึ่งปี เราใช้เงินไปประมาณเท่าไหร่และใช้ในส่วนไหน และควรลดการใช้จ่ายในส่วนนี้หรือไม่ ก็ทำการวิเคราะห์ ว่าต้องการเพิ่มหรือต้องการลดรายจ่าย
                        </p>
                </div>
                <div class="col-12 col-md-4 text-center" style='margin:0 auto'>
                        <img src="public/img/htmlNew.gif" class='text-center' style='width:100%;' alt="">
                       
                    </div>
            </div>
    
        </div>
    </div>
    
</div>
    </div>



   <?php include('public/javascript/scriptJs.html'); ?>

</body>
</html>
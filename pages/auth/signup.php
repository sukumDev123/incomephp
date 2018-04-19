<?php 
include('../../config/MainModules.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/income/">
    <?php include('../../public/style/scriptCss.html') ?>
    
</head>
<body>
<?php include('../../pages/nav/nav.php') ?>
    
<?php
unset($_SESSION['woring']);
if(isset($_POST['submit'])){
    $fisrt = isset($_POST['first']) ? $_POST['first'] : null;
    $last = isset($_POST['last']) ? $_POST['last'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
    $displayName = ($fisrt . " " . $last);
    if($password == $password2){
        $selete = cmdDb("SELECT * FROM userIncome WHERE username='".$username."'");
        $c_num = num_I($selete) ; 
        if($c_num == 0){
            $insert = cmdDb('INSERT INTO userIncome(fristName,username,password,lastName,displayName,roles) VALUES ("'.$fisrt.'" , "'.$username.'" , "'.$password.'" , "'.$last.'" , "'.$displayName.'" , "user" )');

            if($insert) { 
                $_SESSION['user'] = json_encode(
                    [
                    'displayName' => $displayName,
                    'username' => $username,
                    "roles" => "user"       
                    ]
                );
                header('Location:/income/index.php');
                
            }
            else { echo "Not in"; }
        }else{
            $_SESSION['woring'] = 'username หรือ email มีอยู่แล้ว';
            $classW = 'err';
        }

    }
    unset($_POST['submit']);
}
$woring =  isset($_SESSION['woring']) ?  $_SESSION['woring'] : null;


?>


















<div class="container bb" ng-controller="Authentication">
    <div class="row">
        <div class="col-12 col-md-6" style="background:rgb(247, 121, 121);">
            <img src="public/img/flowRoot6731.png" style='width:100%' alt="">
        </div>
        <div class="col-12 col-md-6 p-3">
            <div class="p-2 text-center">
                <h3 class=" p-3">Sing up</h3>
                <small>สวัสดี เพื่อนไหมต้องการงานใช้งานระบบบันชีรายรับรายจ่ายใช่ไหม
                    <br> สมัครสมาชิกเลย และยินดีต้อนรับนะเพื่อน หากมีสมัครสมาชิกแล้ว เชิญที่
                    <a href='pages/auth/signin.php' style='color:rgb(0, 153, 255)'>เข้าสู่ระบบ</a>
                </small>
                <hr>
            </div>
            <form name='myForm' method='post' class='p-3' action='pages/auth/signup.php'>
                <div class="md-form">
                    <label for="ใส่ชื่อจริง">ใส่ชื่อจริง</label>
                    <div class="p-2">
                        <input type="text" name="first" placeholder="ใส่ชื่อจริง" class="input_submit" required>
                    </div>
                </div>
                <div class="md-form">
                    <label for="ใส่นามสกุลจริง">ใส่นามสกุลจริง</label>
                    <div class="p-2">
                        <input type="text" name="last" placeholder="ใส่นามสกุลจริง" class="input_submit" required>
                    </div>
                </div>
               
                <div class="md-form">
                    <label for="username">username</label>
                    <div class="p-2">
                        <input type="text" name="username"  placeholder="username" class="input_submit" required>
                        <small>* กรุณาใส่เป็นภาษา อังกฤษเท่านั้น</small>
                    </div>

                </div>
                <div class="md-form">
                    <label for="password">password</label>

                    <div class="p-2">
                        <input type="password" name="password"  placeholder="password" class="input_submit" required>
                    </div>
                </div>
                <div class="md-form">
                    <label for="password again">ระบุ password อีกครั่ง</label>

                    <div class="p-2">
                        <input type="password" name="password2"  placeholder="password again" class="input_submit" required>
                    </div>
                </div>
                <div class="md-form p-3">
                    <button type="submit" name='submit'  class="btn btn-lg btn-block btn-danger">สมัคร</button>


                </div>
                <p class='<?php echo $classW; ?>'><?php echo $woring;?></p>
                
            </form>
           
        </div>
      
    </div>
</div>


   <?php include('../../public/javascript/scriptJs.html'); ?>

</body>
</html>
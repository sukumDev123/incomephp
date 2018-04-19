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
$_SESSION['woring'] = null;    

if(isset($_POST['submit'])){
   $selete_user = cmdDb("SELECT * FROM userIncome WHERE username='".$_POST['username']."' and password='".$_POST['password']."' ");
   
   $num = num_I($selete_user);
   if($num > 0) {
        $row = $selete_user->fetch_array();
        $_SESSION['user'] = json_encode(
            [
            'idUser' => $row['userId'],
            'displayName' => $row['displayName'],
            'username' => $row['username'],
            "roles" => $row['roles'],
            "create_at" => $row['create_at']        
            ]
        );
        header('Location:/income/index.php');
        
   }else{
        unset($_POST['submit']);
        $_SESSION['woring'] = "รหัสผ่านไม่ถูกต้อง";
        $classW = 'err';
        
   }
   
}
$woring =  $_SESSION['woring'] ?  $_SESSION['woring'] : null;

?>
<div class="container bb"   ng-controller="Authentication">
    <div class="row">
        <div class="col-12 col-md-6" style="background:rgb(247, 121, 121);">
            <img src="public/img/text4725.png" style='width:100%' alt="">
        </div>
        <div class="col-12 col-md-6">
            <div class="p-3 text-center">
                <h3>Sign In </h3>
                <small> ยินดีต้อนรับการกลับมา เข้าสู่ระบบเพื่อใช้งาน
                    <br> และต้อนรับ สมาชิกใหม่ สามรถสมัครได้โดย
                    <a href='pages/auth/signup.php' style='color:rgb(0, 153, 255)'>สมัครสมาชิก</a>
                </small>
                <hr>
            </div>
            <div class="form col-md-10" style='margin:auto;'>
                <form name='myForm' action='pages/auth/signin.php' method='post'  style='padding:10px;' >
                    <div class="md-form">
                        <label for="username">username </label>
                        <div class="p-2">
                            <input type="text" name="username"  placeholder="username" class="input_submit" required>
                        </div>
                    </div>
                    <div class="md-form">
                        <label for="password">password </label>
                        <div class="p-2">
                            <input type="password" name="password"  placeholder="password" class="input_submit" required>
                        </div>
                    </div>
                    <div class="md-form p-3">
                        <button type="submit" name='submit' style='padding:10px;'  class="btn btn-lg btn-block btn-danger">เข้าสู่ระบบ</button>
                    </div>

                    <p class='<?php echo $classW; ?>'><?php echo $woring;?></p>
                </form>
            </div>
            <div class="p-3"></div>
        </div>




    </div>
</div>
</div>


   <?php include('../../public/javascript/scriptJs.html'); ?>

</body>
</html>
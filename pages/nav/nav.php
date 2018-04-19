<?php session_start(); ?>
<?php
$user = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
if(isset($_GET['logout'])){
    logout();
    header('Location:index.php');
    
}
if(!isset($_SESSION['user'])){
   $nav_s ='<div class="form-inline my-2 my-lg-0">
                <div>
                    <a class="nav-link" href="pages/auth/signin.php">
                    <i class="fas fa-sign-in-alt" ></i> เข้าสู่ระบบ
                    </a>

                </div>
                <div>
                    <a class="nav-link" href="pages/auth/signup.php">
                    <i class="fas fa-user-plus" ></i> สมัครสมาชิก</a>
                </div>
            </div>';
      
}else{
    $nav_s = '<div class="form-inline my-2 my-lg-0"  >
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" style="cursor:pointer" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <img src="public/img/pie-chart.png" width="24px" height="24px" alt="..." class="rounded-circle">
              '.$user->displayName .'
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" >เพิ่มประเภทรายการ</a>
          <a class="dropdown-item" href="pages/setting/userSeting.php" >ข้อมูลส่วนตัว</a>
          <a class="dropdown-item" href="?logout=true"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </div>

';
}

?>
<nav class="navbar navbar-expand-lg navbar-light" ng-controller='HeaderControl'>
  
    <div class="container">
    <a class="navbar-brand" style='color:rgb(227, 24, 10)' href='/income/index.php'>
      <img src="public/img/logo.png" width="64px" alt="">
      <small style='color:red;'>รายรับรายจ่าย</small>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul  class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a  ng-if='authentication.users' class="nav-link " href='/income/index.php'>
            <i class="fas fa-home"></i> หน้าหลัก</a>
        </li>
        
    
      </ul>
        <?php echo $nav_s; ?>
      
    </div>

    </div>
</nav>



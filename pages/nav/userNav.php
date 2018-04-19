<?php session_start(); 
$user = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
     
    </ul>
    <span class="navbar-text">
      <?php echo "สวัสดี ".$user->displayName; ?>
    </span>
  </div>
</nav>
<div class="container-fluid ">
   <div class="p-3 pagesAd">
    <div class="list_admin">
        <img  src="public/img/list.png" alt="">

      </div>
    <nav class='navAdmin'>
    <ul class="nav flex-column">
      <li class="nav-item">
    <a class="nav-link active" href="/income/pages/income/dashboard.php">DashBoard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/income/pages/income/insertData.php">เพิ่มรายการรายรับรายจ่าย</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/income/pages/income/insertNeed.php">เพิ่มสิ่งที่อยากได้</a>
  </li>
  <hr>
  <li class="nav-item">
    <a class="nav-link" href="/income/pages/setting/insertSubtype.php">เพิ่มประเภทย่อย</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/income/pages/setting/userSeting.php">ข้อมูลสมาชิก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/income/index.php">กลับไปหน้าหลัก</a>
  </li>
</ul>
    </nav>
   </div>
</div>
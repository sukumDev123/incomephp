<?php
$user = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" style='color:rgb(227, 24, 10)' href='/income/index.php'>
      <img src="public/img/logo.png" width="64px" alt="">
      <small style='color:red;'>รายรับรายจ่าย</small>
    </a>
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
     
    </ul>
    <span class=>
      <?php echo "สวัสดี ".$user->displayName; ?> 
    </span>
  </div>
  </div>
</nav>

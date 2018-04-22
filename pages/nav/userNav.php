<?php
$user = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 <a class="navbar-brand" style='color:rgb(227, 24, 10)' href='/income/index.php'>
       <img src="public/img/logo.png" width="64px" alt="">
       <small style='color:red;'>รายรับรายจ่าย</small>
     </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       
     </ul>
    
 <span class='form-inline my-2 my-lg-0' >
       <?php echo "สวัสดี ".$user->displayName; ?> 
     </span>
 
   </div>
 </nav>
 
 
 
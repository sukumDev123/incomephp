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

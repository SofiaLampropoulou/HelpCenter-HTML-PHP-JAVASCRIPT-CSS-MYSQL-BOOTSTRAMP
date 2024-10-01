<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src='images/logo.png' style='height:30px;'></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<?php
  if(@$_SESSION["typeuser"]=="") {
	  echo "<script>
		window.location.href='index.php';
	  </script>";
	  
	  die();
  }
    if($_SESSION['typeuser']=="admin")
    {
?>


        <li><a href="mapadmin.php">Χάρτης</a></li>
        <li><a href="admin_diaxirisi_apothikis.php">Διαχείριση Αποθήκης Βάσης</a></li>
        <li><a href="stats.php">Στατιστικά</a></li>
        <li><a href="admin_diasostes.php">Διαχείριση Διασωστών</a></li>
        <li><a href="admin_anakoinoseis.php">Διαχείριση Ανακοινώσεων</a></li>

<?php
    }
    ?>

<?php
    if($_SESSION['typeuser']=="user")
    {
?>


        <li><a href="login.php">Αρχική</a></li>
        <li><a href="aitimata.php">Αιτήματα</a></li>
        <li><a href="anakoinoseis.php">Ανακοινώσεις-Προσφορές</a></li>
      
<?php
    }
    ?>

<?php
    if($_SESSION['typeuser']=="dias")
    {
?>


        <li><a href="login.php">Αρχική</a></li>
        <li><a href="mapdias.php">Χάρτης</a></li>
        
        

<?php
    }
    ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
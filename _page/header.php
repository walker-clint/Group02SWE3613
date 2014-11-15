<?php 
$toplinks = "";
session_start();
include_once "connect_to_mysql.php";
if ($_SESSION['id']!="") {
	$id = $_SESSION['id'];
	// Put stored session variables into local php variable
    $sql = mysql_query("SELECT * FROM tbl_user WHERE user_id='$id'");
           
                while ($row = mysql_fetch_array($sql)) {
                    // Use the AYAH object to see if the user passed or failed the game.
                    // Get member ID into a session variable
                    $full_name = $row["first_name"] . $row["last_name"];
                   
                } // close while
            
	
	
	
	$toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
	<li class="btn-label-right">
	<div class="well-1 btn">
	<a href="main_menu.php">$full_name</a>
	</div>
	</li>
	<li class="btn-label-right">
	<div class="well-1 btn">
	<a href="logout.php">Log Out</a>
	</li>
	</ul>';
} else {
	$toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
	<li class="btn-label-right">
	<div class="well-1 btn">
	<a href="login.php">Login</a>
	</div>
	</li>
	<li class="btn-label-right">
	<div class="well-1 btn">
	<a href="register.php">Register</a>
	</div>
	</li>
	</ul>';
}

?>
<header class="navbar-collapse">
  <div id="logo" class="col-xs-6 col-sm-6"> <img src="img/cllogo_medium.png" class="img-responsive"/> </div>
  <div id="top-panel" class="container-fluid expanded-panel"> <br>
    <div class="row"><?php echo $toplinks; ?></div>
  </div>
</header>

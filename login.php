<?php
$errorMsg = "";
session_start(); 
if ($_POST['user_name']) {
//Connect to the database through our include 
include_once './../php/queries.php';
$user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['user_name']);
$password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
$sql = mysql_query("SELECT * FROM tbl_user WHERE login='$user_name' AND password='$password'"); 
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){
        // Get member ID into a session variable
         $id = $row["user_id"];   
        $_SESSION['id'] = $id;
        // Get member username into a session variable
	    $user_name = $row["user_name"];   
        $_SESSION['user_name'] = $user_name;
       
		//checks if user is an administrator or regular user
		if($row["admin"]==0){
			
		}else{
			
		}
		
		
		header("location: employee_menu.php"); 
		exit();
    } // close while
} else {
// Print login failure message to the user and link them back to your login page
 $errorMsg = '<font color="#FF0000">No match in our records, try again </font>';
  exit();
}
}// close if post
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Crazy Leroy's Music</title>
<meta name="description" content="description">
<meta name="author" content="Crazy Leroy's Music">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
<link href="plugins/select2/select2.css" rel="stylesheet">
<link href="css/index_style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
<!-- Form Validation -->
function validate_form ( ) { 
valid = true; 
if ( document.logform.user_name.value == "" ) { 
alert ( "Please enter your User Name" ); 
valid = false;
}
if ( document.logform.password.value == "" ) { 
alert ( "Please enter your password" ); 
valid = false;
}
return valid;
}
<!-- Form Validation -->
</script>
</head>
<body>
<!--Start Header-->
<header class="navbar-collapse">
  <div id="top-panel" class="container-fluid expanded-panel">
    <div class="row">
      <div id="logo" class="col-xs-2 col-sm-2"> <img src="img/cllogo.png" class="img-responsive" /> </div>
    </div>
  </div>
</header>
<!--End Header--> 
<!--Start Middle-->
<div id="main" class="container-fluid">

<!--Start Content-->
<div class="row">
  <div id="left-column" class="col-sm-4">
    <div class="well bs-component"> 
      <!--<legend>LEFT COLUMN</legend>-->
      <h1>Login</h1>
      <div class="form-horizontal" action="" method="POST"></div>
      <div class="well-1 bs-component">
       
          <form action="index.php" method="post" enctype="multipart/form-data" name="logform" id="logform" onsubmit="return validate_form ( );>
            <table>
                  <tr>
        <td><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>
      </tr>
              <tr>
                <td><input type="text" name="user_name" placeholder="Username" id="user_name"></td>
              </tr>
              <tr>
                <td><input type="password" name="password" placeholder="Password" id="password"></td>
              <tr>
                <td><input type="submit" name="login" class="login login-submit" value="login">
                  <input type="submit" name="login" class="login login-submit" value="Register"></td>
              </tr>
            </table>
          </form>
      
      </div>
    </div>
  </div>
  <!--End Content--> 
  
</div>
<!--End Middle--> 

<!--End Container--> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<!--<script src="http://code.jquery.com/jquery.js"></script>--> 
<script src="plugins/jquery/jquery-2.1.0.min.js"></script> 
<script src="plugins/jquery-ui/jquery-ui.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="plugins/bootstrap/bootstrap.min.js"></script> 
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script> 
<script src="plugins/tinymce/tinymce.min.js"></script> 
<script src="plugins/tinymce/jquery.tinymce.min.js"></script> 
<!-- All functions for this theme + document.ready processing --> 
<script src="js/devoops.js"></script>
</body>
</html>

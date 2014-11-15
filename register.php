<!DOCTYPE html>
<html lang="en">
<head>
<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
$errorMsg = "";
session_start();
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Connect to the database through our include 

            $r_user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['r_user_name']);
            $r_password = ereg_replace("[^A-Za-z0-9]", "", $_POST['r_password']);
            $r_firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['r_firstname']); // filter everything but numbers and letters
            $r_lastname = ereg_replace("[^A-Za-z0-9]", "", $_POST['r_lastname']); // filter everything but numbers and letters
            $r_email = stripslashes($_POST['r_email']);
            $r_email = strip_tags($r_email);
            $r_email = mysql_real_escape_string($r_email);
            $r_secret_q = ereg_replace("[^A-Za-z0-9 ]", "", $_POST['r_secret_q']);
            $r_secret_a = ereg_replace("[^A-Za-z0-9 ]", "", $_POST['r_secret_a']);
            if ((!$r_firstname) || (!$r_lastname) || (!$r_email) || (!$r_user_name || (!$r_password))) {

                $r_errorMsg = "You did not submit the following required information!<br /><br />";
                if (!$r_firstname) {
                    $r_errorMsg .= "--- First Name<br />";
                } if (!$r_lastname) {
                    $r_errorMsg .= "--- Last Name<br />";
                }if (!$r_email) {
                    $r_errorMsg .= "--- Email Address<br />";
                }if (!$r_user_name) {
                    $r_errorMsg .= "--- Username<br />";
                }if (!$r_password) {
                    $r_errorMsg .= "--- Password<br />";
                }
            } else {
                $sql_username_check = mysql_query("SELECT user_id FROM tbl_user WHERE login='$r_user_name' LIMIT 1");
                $username_check = mysql_num_rows($sql_username_check);
                if ($username_check > 0) {
                    $r_errorMsg = "<u>ERROR:</u><br />The username is already in use inside our system. Please try another.";
                } else {
                    // Add MD5 Hash to the password variable
                    $hashedPass = md5($password);
                    // Get the inserted ID here to use in the activation email
                    $id = mysql_insert_id();
                    // Add user info into the database table, claim your fields then values 
                    $sql = mysql_query("INSERT INTO tbl_user (user_id,login,password,email,admin,secret_question,secret_answer,first_name, last_name) 
		VALUES('$id','$r_user_name', '$r_password', '$r_email', 0,'$r_secret_q','$r_secret_a','$r_firstname','$r_lastname')") or die(mysql_error());


                    $_SESSION['id'] = $id;

                    header("location: index.php");
                    exit(); // Exit so the form and page does not display, just this success message
        } // Close else after database duplicate field value checks
    } // Close else after missing vars check
} //Close if $_POST
?>
</head>
<body>
<!--Start Header-->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<!--End Header--> 
<!--Start Middle-->
<div id="main" class="container-fluid">
  <div id="right-column" class="col-sm-4"></div>
  <div id="center2-column" class="col-sm-4">
    <div class="well bs-component"> 
      <!--<legend>LEFT COLUMN</legend>-->
      
      <h1 align="center">Register</h1>
      <div class="well-1 bs-component">
        <form  align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          <font color="#FF0000"><?php echo "$r_errorMsg"; ?></font> <br>
          <div class="form-group">
            <label for="r_firstname" class="col-lg-4 control-label">First Name</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_firstname" placeholder="First Name" value='<?php echo "$r_firstname" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_lastname" class="col-lg-4 control-label">Last Name</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_lastname" placeholder="Last Name" value='<?php echo "$r_lastname" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_email" class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_email" placeholder="Email" value='<?php echo "$r_email" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_user_name" class="col-lg-4 control-label">Username</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_user_name" placeholder="Username" value='<?php echo "$r_user_name" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_password" class="col-lg-4 control-label">Password</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_password" placeholder="Password" value='<?php echo "$r_password" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_secret_q" class="col-lg-4 control-label">Secret Question</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_secret_q" placeholder="Secret Question" value='<?php echo "$r_secret_q" ?>'>
            </div>
          </div>
          <div class="form-group">
            <label for="r_secret_a" class="col-lg-4 control-label">Secret Answer</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" name="r_secret_a" placeholder="Secret Answer" value='<?php echo "$r_secret_a" ?>'>
            </div>
          </div>
          <div align="center">
            <input type="submit" value="Register"/>
          </div>
        </form>
      </div>
    </div>
    <!--End Content--> 
    
  </div>
  <div id="right-column" class="col-sm-4"></div>
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

<?php
$errorMsg = "";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Connect to the database through our include 
    include_once "connect_to_mysql.php";
    $user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['user_name']);
    $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']);
    $firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']); // filter everything but numbers and letters
    $lastname = ereg_replace("[^A-Za-z0-9]", "", $_POST['lastname']); // filter everything but numbers and letters
    $email = stripslashes($_POST['email']);
    $email = strip_tags($email);
    $email = mysql_real_escape_string($email);
    $secret_q = ereg_replace("[^A-Za-z0-9]", "", $_POST['secret_q']);
    $secret_a = ereg_replace("[^A-Za-z0-9]", "", $_POST['secret_a']);
    if ((!$firstname) || (!$lastname) || (!$email) || (!$user_name || (!$password))) {

        $errorMsg = "You did not submit the following required information!<br /><br />";
        if (!$firstname) {
            $errorMsg .= "--- First Name<br />";
        } if (!$lastname) {
            $errorMsg .= "--- Last Name<br />";
        }if (!$email) {
            $errorMsg .= "--- Email Address<br />";
        }if (!$user_name) {
            $errorMsg .= "--- Username<br />";
        }if (!$password) {
            $errorMsg .= "--- Password<br />";
        }
    } else {
        $sql_username_check = mysql_query("SELECT user_id FROM tbl_user WHERE login='$user_name' LIMIT 1");
        $username_check = mysql_num_rows($sql_username_check);
        if ($username_check > 0) {
            $errorMsg = "<u>ERROR:</u><br />The username is already in use inside our system. Please try another.";
        } else {
            // Add MD5 Hash to the password variable
            $hashedPass = md5($password);
            // Get the inserted ID here to use in the activation email
            $id = mysql_insert_id();
            // Add user info into the database table, claim your fields then values 
            $sql = mysql_query("INSERT INTO tbl_user (user_id,login,password,email,admin,secret_question,secret_answer,first_name, last_name) 
		VALUES('$id','$user_name', '$password', '$email', 0,'$secret_q','$secret_a','$firstname','$lastname')") or die(mysql_error());




            //header("location: customer_information.php");
            //exit(); 



            header("location: index.html");
            exit(); // Exit so the form and page does not display, just this success message
        } // Close else after database duplicate field value checks
    } // Close else after missing vars check
} //Close if $_POST
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; ?>
        <script type="text/javascript">
<!-- Form Validation -->
            function validate_form( ) {
                valid = true;
                if (document.logform.user_name.value == "") {
                    alert("Please enter your User Name");
                    valid = false;
                }
                if (document.logform.password.value == "") {
                    alert("Please enter your password");
                    valid = false;
                }
                return valid;
            }
<!-- Form Validation -->
        </script>
    </head>
    <body>
        <!--Start Header-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header--> 

        <!--Start Middle-->
        <div id="main" class="container-fluid">

            <!--Start Content-->
            <div class="row">
                <div id="left-column" class="col-sm-5">
                    <div class="well bs-component"> 
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1>Register</h1>
                        <div class="well-1 bs-component">
                            <table>
                                <form  align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">First Name:</div></td>
                                        <td width="409"><input name="firstname" type="text" value='<?php echo "$firstname" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Last Name:</div></td>
                                        <td width="409"><input name="lastname" type="text" value='<?php echo "$lastname" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Email: </div></td>
                                        <td width="409"><input name="email" type="text" value='<?php echo "$email" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Username:</div></td>
                                        <td width="409"><input name="user_name" type="text" value='<?php echo "$user_name" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Password:</div></td>
                                        <td width="409"><input name="password" type="password" value='<?php echo "$password" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Secret Question:</div></td>
                                        <td width="409"><input name="secret_q" type="text" value='<?php echo "$secret_q" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td width="163"><div align="right">Secret Answer:</div></td>
                                        <td width="409"><input name="secret_a" type="text" value='<?php echo "$secret_a" ?>' /></td>
                                    </tr>
                                    <tr>
                                        <td><div align="right"></div></td>
                                        <td><input type="submit" class="login login-submit" name="submitted" value="submit" /></td>
                                    </tr>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Content--> 

            </div>
            <!--End Middle--> 
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/footer.php'; ?>
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

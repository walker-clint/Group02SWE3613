<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
		require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
        
        $errorMsg = "";
        session_start();
        include_once "connect_to_mysql.php";
        if ($_POST['user_name']) {
            //Connect to the database through our include
            $user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['user_name']);
            $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
            $sql = mysql_query("SELECT * FROM tbl_user WHERE login='$user_name' AND password='$password'");
            $login_check = mysql_num_rows($sql);
            if ($login_check > 0) {
                while ($row = mysql_fetch_array($sql)) {
                    // Use the AYAH object to see if the user passed or failed the game.
                    // Get member ID into a session variable
                    $id = $row["user_id"];
                    $_SESSION['id'] = $id;
                    // Get member username into a session variable
                    $user_name = $row["login"];
                    $_SESSION['login'] = $user_name;
                    $_SESSION['is_admin'] = $row["admin"];//checks if user is an administrator or regular user
					
					
                        header('Location: index.php');
                        exit();
                    
                } // close while
            } else {
                $errorMsg .= "The username or password you entered is incorrect<br />";
                echo "error message";
            }
        }// close if post
 // Close else after database duplicate field value checks
            // Close else after missing vars check
         //Close if $_POST
        ?>
    </head>
    <body>
        <!--Start Header-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header--> 
        
        <!--Start Middle-->
        <div id="main" class="container-fluid">

            <!--Start Content-->
            <div class="row">
                <div id="left-column" class="col-sm-4"></div>
                <div id="center1-column" class="col-sm-4">
                    <div class="well bs-component"> 
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1 align="center">Login</h1>
                        <div class="well-1 bs-component">
                            <form class="form-horizontal"  method="post" enctype="multipart/form-data" name="logform" id="logform" >
                             <font color="#FF0000"><?php echo "$r_errorMsg"; ?></font> <br>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-4 control-label">User Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="user_name" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input align="center" type="Password" class="form-control-1" name="password"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div align="center">
                                    <input type="submit" value="Login"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
                <div id="right-column" class="col-sm-4"></div>
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
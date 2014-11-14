<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        // session_register("myusername");
        $_SESSION['login_user'] = $myusername;

        header("location: reports.php");
    } else {
        $error = '<span class="error">Your Login Name or Password is invalid<br></span>';
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Login Page</title>

        <link href="../style.css" rel="stylesheet" type="text/css" />


    </head>
    <body bgcolor="#FFFFFF">

        <h1>Welcome to Toothson Family Dentistry</h1>

        <div style="float: center">
            <img src="/Toothson.jpg" alt="Logo" style="float: top">    
        </div>
        
        <div class="center">
            <?php echo $error; ?>

            <form action="login.php" method="post">
                <label>UserName  :</label><input type="text" name="username" class="box"/><br /><br />
                <label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
                <input type="submit" value=" Submit "/><br />

            </form>


        </div>

    </body>
</html>

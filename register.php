<!DOCTYPE html>
<html lang="en">
<head>
<?php 
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; 
require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$error = $_SESSION['error'];
?>
</head>
<body>
<!--Start Header-->

<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<!--End Header--> 
<!--Start Middle-->
<div id="main" class="container-fluid">

    <form class="form-horizontal" action="php/RegisterService.php" method="POST">
      <h1>Registration</h1>
      <div class="row">
        <div class="well bs-component">
          <div class="well-1 bs-component">
          <font color="#FF0000"><?php echo $error; ?></font> <br>
            <div class="form-group">
              <label for="firstname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">First Name</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="firstname"
                                                               name="firstname"
                                                               placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="lastname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Last Name</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="lastname"
                                                               name="lastname"
                                                               placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Email</label>
              <div class="col-xs-8 col-md-8">
                <input type="email" class="form-control-1" id="email"
                                                               name="email"
                                                               placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="username" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Username</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="username"
                                                               name="username"
                                                               placeholder="Username" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Password</label>
              <div class="col-xs-8 col-md-8">
                <input type="password" class="form-control-1" name="password"
                                                               name="password"
                                                               placeholder="Password" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="secret_q" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Question</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" name="secret_q"
                                                               name="secret_q"
                                                               placeholder="Secret Question">
              </div>
            </div>
            <div class="form-group">
              <label for="secret_a" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Answer</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" name="secret_a"
                                                               name="secret_a"
                                                               placeholder="Secret Answer">
              </div>
            </div>
            <div class="captcha-container" align="center">
              <div class="captcha-container frame">
                <?php
				require $_SERVER['DOCUMENT_ROOT'] . ("/recaptchalib.php");
                $publickey = "6LcMdf0SAAAAAGjxpNWGXfNDgYGk-v-dxZSoUxrg"; // you got this from the signup page
                echo recaptcha_get_html($publickey);
                ?>
              </div>
            </div>
            <div align="center">
              <input class="btn btn-primary" type="submit" value="Register"/>
            </div>
          </div>
        </div>
      </div>
    </form>

</div>

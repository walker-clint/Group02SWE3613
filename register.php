<!DOCTYPE html>
<html lang="en">
<head>
<?php 
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; 
require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$error = $_SESSION['error'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$secret_q = $_SESSION['secret_q'];
$secret_a = $_SESSION['secret_a'];

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
  <h1 align="center">Registration</h1>
  <div class="well-1 bs-component">
  <form class="form-horizontal" action="php/RegisterService.php" method="POST">
    <font color="#FF0000"><?php echo $error; ?></font> <br>
    <div class="form-group">
      <label for="firstname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">First Name</label>
      <div class="col-xs-8 col-md-8">
        <input type="text" class="form-control-1" id="firstname"
                                                               name="firstname"
                                                               placeholder="First Name" value='<?php echo "$firstname" ?>' required>
      </div>
    </div>
    <div class="form-group">
      <label for="lastname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Last Name</label>
      <div class="col-xs-8 col-md-8">
        <input type="text" class="form-control-1" id="lastname"
                                                               name="lastname"
                                                               placeholder="Last Name" value='<?php echo "$lastname" ?>' required>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Email</label>
      <div class="col-xs-8 col-md-8">
        <input type="email" class="form-control-1" id="email"
                                                               name="email"
                                                               placeholder="Email" value='<?php echo "$email" ?>' required>
      </div>
    </div>
    <div class="form-group">
      <label for="username" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Username</label>
      <div class="col-xs-8 col-md-8">
        <input type="text" class="form-control-1" id="username"
                                                               name="username"
                                                               placeholder="Username" autocomplete="off" required>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Password</label>
      <div class="col-xs-8 col-md-8">
        <input type="password" class="form-control-1" name="password"
                                                               name="password"
                                                               placeholder="Password" autocomplete="off" required>
      </div>
    </div>
    <div class="form-group">
      <label for="secret_q" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Question</label>
      <div class="col-xs-8 col-md-8">
        <input type="text" class="form-control-1" name="secret_q"
                                                               name="secret_q"
                                                               placeholder="Secret Question" value='<?php echo "$secret_q" ?>'>
      </div>
    </div>
    <div class="form-group">
      <label for="secret_a" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Answer</label>
      <div class="col-xs-8 col-md-8">
        <input type="text" class="form-control-1" name="secret_a"
                                                               name="secret_a"
                                                               placeholder="Secret Answer" value='<?php echo "$secret_a" ?>'>
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

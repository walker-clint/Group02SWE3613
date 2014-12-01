<!--Registration form-->

<div align="center"> 
  <!--Start Content-->
  <form class="form-horizontal" action="login.php" method="POST">
    <h1>Registration</h1>
    <div class="row">
      <div class="well bs-component"> 
        <!--<legend>LEFT COLUMN</legend>-->
        <h1 align="center">Login</h1>
        <div class="well-1 bs-component">
          <div class="form-group">
            <label for="user_name" class="col-lg-4 control-label">User Name</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value='<?php echo "$myusername" ?>' required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-lg-4 control-label">Password</label>
            <div class="col-lg-8">
              <input align="center" type="Password" class="form-control" id="password" name="password"
                                               placeholder="Password" required>
            </div>
          </div>
          <div align="center">
            <input class="btn btn-primary" type="submit" value="Login"/>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

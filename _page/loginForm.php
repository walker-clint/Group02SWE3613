<!--Registration form-->
<div align="center"> 
  <!--Start Content-->
  <form class="form-horizontal" action="login.php" method="POST">
    <h1>Login</h1>
    
    <div class="row">
      <div class="well bs-component">
        <div class="well-1 bs-component">
          <div class="form-group">
            <label for="user_name" class="col-xs-4 col-md-4 control-label"
                               align="right">User Name</label>
            <div class="col-lg-8">
              <input type="text" class="form-control-1" id="username" name="username" placeholder="User Name" value='<?php echo "$myusername" ?>' required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-xs-4 col-md-4 control-label"
                               align="right">Password</label>
            <div class="col-lg-8">
              <input align="center" type="Password" class="form-control-1" id="password" name="password"
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

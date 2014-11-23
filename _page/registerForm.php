<div align="center">
    <!--Start Content-->
    <form class="form-horizontal" action="register.php" method="POST">
        <h1>Registration</h1>

        <div class="row">
            <div class="well bs-component">
                <div class="well-1 bs-component">

                    <div class="form-group">
                        <label for="firstname" class="col-xs-4 col-md-4 control-label"
                               align="right">First Name</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="text" class="form-control-1" id="firstname"
                                   name="firstname"
                                   placeholder="First Name" value='<?php
                                   if (!empty($firstname)) {
                                       echo "$firstname";
                                   }
                                   ?>' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-xs-4 col-md-4 control-label"
                               align="right">Last Name</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="text" class="form-control-1" id="lastname"
                                   name="lastname"
                                   placeholder="Last Name"value='<?php
                                   if (!empty($lastname)) {
                                       echo $lastname;
                                   }
                                   ?>' required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-xs-4 col-md-4 control-label"
                               align="right">Email</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="email" class="form-control-1" id="email"
                                   name="email"
                                   placeholder="Email" value='<?php
                                   if (!empty($email)) {
                                       echo "$email";
                                   }
                                   ?>' required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-xs-4 col-md-4 control-label"
                               align="right">Username</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="text" class="form-control-1" id="username"
                                   name="username"
                                   placeholder="Username" value ="<?php
                                   if (!empty($username)) {
                                       echo $username;
                                   }
                                   ?>" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-xs-4 col-md-4 control-label"
                               align="right">Password</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="password" class="form-control-1" name="password"
                                   name="password"
                                   placeholder="Password" autocomplete="off" required  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="secret_q" class="col-xs-4 col-md-4 control-label"
                               align="right">Secret Question</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="text" class="form-control-1" name="secret_q"
                                   name="secret_q"
                                   placeholder="Secret Question" value='<?php
                                   if (!empty($secret_q)) {
                                       echo "$secret_q";
                                   }
                                   ?>' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="secret_a" class="col-xs-4 col-md-4 control-label"
                               align="right">Secret Answer</label>

                        <div class="col-xs-8 col-md-8">
                            <input type="text" class="form-control-1" name="secret_a"
                                   name="secret_a"
                                   placeholder="Secret Answer" value='<?php ?>'>
                        </div>
                    </div>
                    <div class="captcha-container" align="center">
                        <div class="captcha-container frame">
                            <?php
                                            if (false !== strpos($page, 'register.php')) {
                                            } else {
                            require_once $_SERVER['DOCUMENT_ROOT'] . ("/recaptchalib.php");
                            $publickey = "6LcMdf0SAAAAAGjxpNWGXfNDgYGk-v-dxZSoUxrg"; // you got this from the signup page
                            echo recaptcha_get_html($publickey);
                                            }
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
<!--MyModal1, the login modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog modal-vertical-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="btn btn-primary" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <div align="center">
                        <div class="well bs-component">
                            <h1 align="center">Login</h1>

                            <div class="well-2 bs-component">
                                <form class="form-horizontal" action="/php/loginService.php" method="POST">
                                    <div class="form-group">
                                        <label for="user_name" class="col-sm-4 col-md-4 control-label">User
                                            Name</label>

                                        <div class="col-sm-8 col-md-8">
                                            <input type="text" class="form-control-1" id="username"
                                                   name="username" placeholder="User Name" value='<?php // echo "$myusername"       ?>' required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"
                                               class="col-sm-4 col-md-4 control-label">Password</label>

                                        <div class="col-sm-8 col-md-8">
                                            <input type="Password" class="form-control-1"
                                                   id="password" name="password"
                                                   placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <input class="btn btn-primary" type="submit" value="Login"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
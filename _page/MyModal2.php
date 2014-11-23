<!--MyModal2, the registration modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog modal-vertical-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="btn btn-primary" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/registerForm.php"); ?>
                    <!--End Content-->
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
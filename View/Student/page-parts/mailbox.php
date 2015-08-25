<aside class="right-side">
    <!-- Content Header (Page header) -->
    <?php require_once("__mailbox/header.php"); ?>

    <!-- Main content -->
    <section class="content">
        <!-- MAILBOX BEGIN -->
        <div class="mailbox row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <?php require_once("__mailbox/compose.php"); ?>
                                <!-- Navigation - folders-->
                                <?php require_once("__mailbox/folders.php"); ?>
                            </div><!-- /.col (LEFT) -->
                            <div class="col-md-9 col-sm-8">
                                <div class="row pad">
                              	<?php require_once("__mailbox/action-bar.php"); ?>
                                </div><!-- /.row -->

                                <div class="table-responsive">
                                    <!-- THE MESSAGES -->
                                    <?php require_once("__mailbox/messages.php"); ?>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.col (RIGHT) -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                    	<?php require_once("__mailbox/footer.php"); ?>
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
        </div>
        <!-- MAILBOX END -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- COMPOSE MESSAGE MODAL -->
<?php require_once("__mailbox/compose-modal.php"); ?>

<script type="text/javascript" src = "_required/js/mailbox.js">

</script>

</body>
</html>
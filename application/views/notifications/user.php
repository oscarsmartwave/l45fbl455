<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notifications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Push Notification
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                            <form role="form" method="POST" action="<?php echo base_url()."notifications/user"; ?>" class="">

                                <div class="form-group">
                                    <label for="users" class="control-label"> User : </label>
                                    <select id="users" class="form-control" name="user">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message"> Message : </label>
                                    <textarea class="form-control" rows="4" name="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Increment App Badge?</label>
                                    <input type="checkbox" name="incrementAppBadge" class="YesNoSwitch pull-right" checked>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-rocket"></i>&nbsp;Send</button>

                            </form> <!-- /form --> 
                        </div><!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
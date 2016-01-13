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
                            <form role="form" method="POST" action="<?php echo base_url()."notifications/timezone"; ?>" class="">
                                <div class="form-group">
                                    <label for="timezone" class="control-label"> Time Zone : </label>
                                    <select id="timezone" class="form-control" name="timezone">
                                        <option name="Asia/Manila" id="Asia/Manila"> Asia/Manila </option>
                                        <?php

                                        foreach ($america as $key => $value) 
                                        {
                                            echo "<option id=".$key.">".$key."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message"> Message : </label>
                                    <textarea class="form-control" rows="4" name="message" id="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Increment App Badge?</label>
                                    <input type="checkbox" name="incrementAppBadge" class="YesNoSwitch pull-right" checked>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right" id="btnTimeZone"><i class="fa fa-rocket"></i>&nbsp;Send</button>

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

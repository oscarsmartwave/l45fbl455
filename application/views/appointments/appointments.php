<?php
include APPPATH.'/libraries/header.php';

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Appointments</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                                <div class="dataTable_wrapper">
                            
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url() ?>index.php/appointments/view">View All Appointments</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>index.php/appointments/operators">Per Operator</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>index.php/appointments/time">Time / Day</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>index.php/appointments/status">View Appointments Status</a>
                                        </li>
                                    <ul>        

                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <!-- /.panel-body -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    
<?php
include APPPATH.'/libraries/footer.php';
?>

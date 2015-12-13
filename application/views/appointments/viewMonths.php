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
                                    <div id="year-graph" style="height:300px;">
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/year/<?php echo date('Y'); ?>/month/january">January</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/">February</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/march">March</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/april">April</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/may">May</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/june">June</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/july">July</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/august">August</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/september">September</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/october">October</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/november">November</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/appointments/<?php echo date('Y'); ?>/month/december">December</a>
                                        </li>
                                    </ul>
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

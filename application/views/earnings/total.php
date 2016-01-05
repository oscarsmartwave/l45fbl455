<?php
    include APPPATH.'libraries/header.php';
    //die('<pre>'.print_r($appointmentsTimeline, true));
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 clas="page-header">Total Earnings</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Earnings
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a> </a>
                                    <div class="table-responsive">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-bordered table-hover table-striped" id="earningsTable">
                                                <thead>
                                                    <td>
                                                        Month
                                                    </td>
                                                    <td>
                                                        Count
                                                    </td>
                                                    <td>
                                                        Sum
                                                    </td>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    

                                                    ?>
                                                </tbody>

                                            </table>
                                        </div><!-- /.dataTable_wrapper -->
                                    </div><!-- /.table-responsive -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="pull-left">TOTAL EARNINGS OF 2015 : </span> <span class="pull-right">$ </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="pull-left">TOTAL EARNINGS : </span> <span class="pull-right">$ </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.col-lg-12 -->

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php

include 'footer.php';
?>

<?php
    include APPPATH.'libraries/header.php';
    //die('<pre>'.print_r($appointmentsTimeline, true));
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
<<<<<<< HEAD
                    <h4 clas="page-header">Total Earnings</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Earnings
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a> << <?php
                                    echo $Data->year-1;
                                    ?></a>
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
                                                    foreach($Data->month as $row)
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>
                                                                '.$row->monthName.'
                                                            </td>
                                                            <td>
                                                                '.$row->totalPayment.'
                                                            </td>
                                                            <td>
                                                                '.$row->sum.'
                                                            </td>
                                                        </tr>
                                                        ';
                                                    }

                                                    ?>
                                                </tbody>

                                            </table>
                                        </div><!-- /.dataTable_wrapper -->
                                    </div><!-- /.table-responsive -->
                                </div>
                            </div>
=======
                    <h4 clas="page-header">For a Time Period</h4>
                    
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                    Line Chart
                                            </div>
                                                <!-- /.panel-heading -->
                                        <div class="panel-body">
                                        <img src="http://placehold.it/920x400" class="center-block img-responsive">
                                    <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                    </div>
                                    <!-- /.col-lg-12 -->

                            </div>

                            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Operators
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Last Name</th>
                                            <th>First Name(s)</th>
                                            <th>Earnings</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>User</td>
                                            <td>??????</td>
                                            <td>??????</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

>>>>>>> ef13545d90c0f4341f8805bacf35545721b3fb63
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
<<<<<<< HEAD
                                            <span class="pull-left">TOTAL EARNINGS OF 2015 : </span> <span class="pull-right">$ <?php echo $Data->sum_this_year; ?></span>
=======
                                            <span class="pull-left">TOTAL EARNINGS OF 2015 : </span> <span class="pull-right"></span>
>>>>>>> ef13545d90c0f4341f8805bacf35545721b3fb63
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
<<<<<<< HEAD
                                            <span class="pull-left">TOTAL EARNINGS : </span> <span class="pull-right">$ <?php echo $Data->sum_total; ?></span>
=======
                                            <span class="pull-left">TOTAL EARNINGS : </span> <span class="pull-right"></span>
>>>>>>> ef13545d90c0f4341f8805bacf35545721b3fb63
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

<<<<<<< HEAD
                    </div>
=======
                    
>>>>>>> ef13545d90c0f4341f8805bacf35545721b3fb63
                </div>
                <!-- /.col-lg-12 -->

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php

<<<<<<< HEAD
include APPPATH.'libraries/footer.php';
=======
include 'footer.php';
>>>>>>> ef13545d90c0f4341f8805bacf35545721b3fb63
?>

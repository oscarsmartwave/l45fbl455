<?php
include APPPATH.'/libraries/header.php';
foreach($results as $row)
{
    $operatorDetails = $row->operatorId;
}
?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All Appointments of Operator : <?php echo $operatorDetails->lastName.', '.$operatorDetails->firstName; ?></h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                                <div class="dataTable_wrapper">

                                    <div id="operator-graph" style="height:300px;">
                                    </div>
                            
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Location</th>
                                                <th>Model</th>
                                                <th>Car</th>
                                                <th>Owner</th>
                                                <th>Time Start</th>
                                                <th>Time End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
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

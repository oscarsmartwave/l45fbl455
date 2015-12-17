<?php
include APPPATH.'libraries/header.php';

//die('<pre>'.print_r($results, true));
foreach ($appointments as $row)
{
    foreach ($row as $val) 
    {
        $id = $val->objectId;
    }
    
}
?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Select Operator</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Model</th>
                                        <th>License</th>
                                        <th>Color</th>
                                        <th>Owner</th>
                                        <th>Appt Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <div class="container">
                            <p>
                            
                            </p>
                            </div>
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
include APPPATH.'libraries/footer.php';
?>

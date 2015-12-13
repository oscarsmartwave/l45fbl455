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
                                    <div id="operator-graph" style="height:300px;">
                                    </div>
                                    <ul>
                                    <?php
                                        foreach($results as $row)
                                        {
                                            echo 
                                            '
                                            <li>
                                                <a href="'.base_url().'index.php/appointments/operators/'.$row->objectId.'">
                                                Username : '.$row->username.'&nbsp; Name : '.$row->lastName.', '.$row->firstName.'</a>
                                            </li>
                                            ';
                                        }
                                    ?>
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

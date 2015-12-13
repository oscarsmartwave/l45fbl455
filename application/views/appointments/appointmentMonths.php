<?php
include APPPATH.'/libraries/header.php';

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All Appointments</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                                <div class="dataTable_wrapper">
                            
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
                                            <?php
                                            
                                            foreach($results as $val)
                                            {
                                                $dateStart = $val->timeStart->iso;
                                                $timeStart = strtotime($dateStart);
                                                $fixedStart = date('l, F jS Y \a\t g:ia', $timeStart);

                                                $dateEnd = $val->timeEnd->iso;
                                                $timeEnd = strtotime($dateEnd);
                                                $fixedEnd = date('l, F jS Y \a\t g:ia', $timeEnd);
                                                    echo '
                                                    <tr>
                                                        <td>'.$val->apptLocation.'</td>
                                                        <td>'.$val->carId->model.'</td>
                                                        <td>'.$val->carId->license.'</td>
                                                        <td>'.$val->carId->ownerId->lastName.', '.$val->carId->ownerId->firstName.'</td>
                                                        <td>'.$fixedStart.'</td>
                                                        <td>'.$fixedEnd.'</td>
                                                    </tr>';
                                            }

                                            ?>
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

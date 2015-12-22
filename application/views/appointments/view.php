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
        <div class="row appointed">
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
                               foreach($Data as $val)
                               {
                                   // $newDate = date("j F Y", strtotime($val->apptDate)); 
                                 echo 
                                 "
                                 <tr>
                                    <td>".$val->locationString."
                                    </td>
                                    <td>".$val->model."
                                    </td>
                                    <td>".$val->make."
                                    </td>
                                    <td>".$val->userObjectid."
                                    </td>
                                    <td>".$val->madeAt()."
                                    </td>
                                    <td>".$val->apptDate."
                                    </td>
                                </tr>
                                ";
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

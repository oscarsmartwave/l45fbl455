<?php
include APPPATH.'/libraries/header.php';
?>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Assigned Appointments</h1>
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
                                    <th>Operator</th>
                                    <th>Package</th>
                                    <th>Car</th>
                                    <th>Owner</th>
                                    <th>Appointment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach($Data as $val)
                                {
                                    $i++;
                                    $optr = $val->optrObjectId;
                                    $pkg = $val->packageObjectId;
                                    $car = $val->carObjectId;
                                    $user = $val->userObjectId;
                                    echo 
                                    "
                                    <tr>
                                        <td>".$val->locationString."
                                        </td>
                                        <td id='".$optr."'>".$optr."
                                        </td>
                                        <td id='".$pkg."'>".$pkg."
                                        </td>
                                        <td id='".$car."'>".$car."
                                        </td>
                                        <td id='".$user."'>".$user."
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
// include APPPATH.'/libraries/footer.php';
require_once 'appointments_footer.php';
?>

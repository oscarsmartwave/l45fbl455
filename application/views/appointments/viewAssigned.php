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
                                foreach($Data as $val)
                                {
                                   $newDate = date("j F Y", strtotime($val->apptDate)); 
                                   echo 
                                   "
                                   <tr>
                                    <td>".$val->locationString."
                                    </td>
                                    <td>".$val->optrObjectId."
                                    </td>
                                    <td>".$val->packageObjectId."
                                    </td>
                                    <td>".$val->carObjectId."
                                    </td>
                                    <td>".$val->userObjectId."
                                    </td>
                                    <td>".$newDate."
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
<script src="<?php echo base_url();?>assets/js/appointments/appointments_assigned.js"></script>

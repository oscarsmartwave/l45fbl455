<?php
include APPPATH.'/libraries/header.php';

foreach($users as $row)
{
    foreach($row as $val)
    {
        $lastName = $val->lastName;
        $firstName = $val->firstName;
    }
}
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Car/s of Owner : <?php echo $lastName.', '.$firstName; ?></h1>
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
                                                <th>Car Model</th>
                                                <th>License</th>
                                                <th>Color</th>
                                                <th>Car Make</th>
                                                <th>Car Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($cars as $row)
                                            {
                                                foreach($row as $val)
                                                {
                                                    echo '
                                                    <tr>
                                                        <td>'.$val->model.'</td>
                                                        <td>'.$val->license.'</td>
                                                        <td>'.$val->color.'</td>
                                                        <td>'.$val->make.'</td>
                                                        <td>'.$val->type.'</td>
                                                    </tr>
                                                    ';
                                                }
                                                    
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/carmakes/" class="btn btn-large btn-success">
                                    <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Users
                                </a>
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

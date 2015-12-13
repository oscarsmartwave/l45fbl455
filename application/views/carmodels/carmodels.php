<?php
include APPPATH.'/libraries/header.php';

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Car Models</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo base_url(); ?>index.php/carmodels/add" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Model</a>
                        <div class="panel-body">

                                <div class="dataTable_wrapper">
                            
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Model</th>
                                                <th>Car Type</th>
                                                <th>Car Make</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($results as $val)
                                            {
                                                echo '<tr>
                                                <td>'.$val->model.'</td>
                                                <td>'.$val->carType.'</td>
                                                <td>'.$val->carMake.'</td>
                                                <td class="center">
                                                <a href="'.base_url().'index.php/carmodels/edit/'.$val->objectId.'"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="'.base_url().'index.php/carmodels/delete/'.$val->objectId.'"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                                </td>
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

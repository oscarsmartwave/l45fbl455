<?php
include APPPATH.'libraries/header.php';
foreach ($results as $val)
{
    $id = $val->objectId;
}


?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Remove Operator</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <?php
                            if(isset($id))
                            {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Sure !</strong> to remove the following record ? 
                                </div>
                                <?php
                            }

                            ?>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Model</th>
                                        <th>Car Type</th>
                                        <th>Car Make</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($results as $val)
                                    {
                                        echo
                                            '<tr>
                                            <td>'.$val->model.'</td>
                                            <td>'.$val->carType.'</td>
                                            <td>'.$val->carMake.'</td>
                                            </tr>';
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <div class="container">
                            <p>
                            <?php
                            if(isset($id))
                            {
                                ?>
                                <form method="post" action="<?php echo base_url(); ?>index.php/carmodels/delete/<?php echo $id; ?>">
                                <input type="hidden" name="id" value="" />
                                <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
                                <a href="<?php echo base_url(); ?>index.php/carmodels/" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
                                </form>  
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="<?php echo base_url(); ?>index.php/carmodels/" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
                                <?php
                            }
                            ?>
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

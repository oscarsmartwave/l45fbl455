<?php
include APPPATH.'libraries/header.php';
// die('<pre>'.print_r($user, true));
?>
     <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Deactivate User</h1>
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
                                        <th>Username</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Email</td>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>View Cars</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo 
                                    "
                                    <tr>
                                        <td>".$user[0]->get("username")."
                                        </td>
                                        <td>".$user[0]->get("lastName")."
                                        </td>
                                        <td>".$user[0]->get("firstName")."
                                        </td>
                                        <td>".$user[0]->get("email")."
                                        </td>
                                        <td>".$user[0]->get("homeAddress")."
                                        </td>
                                        <td>".$user[0]->get("phoneNumber")."
                                        </td>
                                        <td>CARS
                                        </td>
                                    </tr>
                                    ";
                                    ?>
                                </tbody>
                            </table>
                            <div class="container">
                            <p>
                            <?php
                            if($user[0]->getObjectId())
                            {
                                ?>
                                <form method="post" action="<?php echo base_url(); ?>users/deactivate/<?php echo $user[0]->getObjectId(); ?>">
                                <input type="hidden" name="id" value="<? echo $user[0]->getObjectId(); ?>" />
                                <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
                                <a href="<?php echo base_url(); ?>users/deactivate/<?php echo $user[0]->getObjectId(); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
                                </form>  
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
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

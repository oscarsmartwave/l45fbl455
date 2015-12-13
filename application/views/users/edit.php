<?php
include APPPATH.'libraries/header.php';

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Users</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Users
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url(); ?>index.php/users/edit/<?php echo $id; ?>" method="post">
                                        <?php
                                        foreach($users as $row)
                                        {
                                            foreach($row as $val)
                                            {
                                            ?>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="username" value="<?php echo $val->username; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $val->email; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo $val->firstName; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="<?php echo $val->lastName; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="homeAddress" placeholder="Address" value="<?php echo $val->homeAddress; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phoneNumber" placeholder="Contact Number" value="<?php echo $val->phoneNumber; ?>">
                                            </div>
                                            <?php                                                
                                            }
                                        }
                                        ?>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-edit"></span> Update Record
                                            </button>  
                                        <a href="#" class="btn btn-large btn-success">
                                            <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index
                                        </a>
            
                                        </div>
                                    </form>
                                </div> <!-- /.col-lg-6 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div> <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    
<?php

include APPPATH.'libraries/footer.php';
?>

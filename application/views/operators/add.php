<?php
include APPPATH.'libraries/header.php';


?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Operator</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Operator
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url(); ?>operators/add/" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="email">Email : </label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username : </label>
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Password : </label>                                            
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">First Name : </label>
                                            <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Last Name : </label>
                                            <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Home Address : </label>
                                            <input type="text" class="form-control" name="homeAddress" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Contact Number : </label>
                                            <input type="text" class="form-control" name="phoneNumber" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="uploadPhoto">Upload Photo : </label>
                                            <input type="file" class="form-control" name="uploadPhoto" placeholder="Photo" accept="image/*" />
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-plus"></span> Create New Record
                                            </button>  
                                        <a href="<?php echo base_url(); ?>operators/" class="btn btn-large btn-success">
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

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
                <div class="panel panel-default panel-body-bg">
                    <div class="panel-heading">
                        Add New Operator
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form id="addform" role="form" action="<?php echo base_url(); ?>operators/add/" method="post" enctype="multipart/form-data">                                    <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username : </label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">First Name : </label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Last Name : </label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Home Address : </label>
                                    <input type="text" class="form-control" name="homeAddress" id="homeAddress" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Contact Number : </label>
                                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="uploadPhoto">Upload Photo : </label>
                                    <input type="file" class="form-control" name="uploadPhoto" id="uploadPhoto" placeholder="Photo" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="createNew">
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
include 'add-footer.php';
?>

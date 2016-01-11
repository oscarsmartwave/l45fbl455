<?php
include APPPATH.'libraries/header.php';
// die('<pre>'.print_r($operators[0]->get("isSuspended"), true));
?>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Operator</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Operator
                    </div>
                    <div class="panel-body panel-body-bg">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" class="formEdit" id="<?php echo $operators[0]->getObjectId(); ?>" action="<?php echo base_url(); ?>operators/edit/<?php echo $operators[0]->getObjectId(); ?>" method="post">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $operators[0]->getUsername(); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $operators[0]->getEmail(); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="<?php echo $operators[0]->get("firstName"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $operators[0]->get("lastName"); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="homeAddress" id="homeAddress" placeholder="Address" value="<?php echo $operators[0]->get("homeAddress") ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Contact Number" value="<?php echo $operators[0]->get("phoneNumber"); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="btnUpdate">
                                            <span class="glyphicon glyphicon-edit"></span> Update Record
                                        </button>
                                        <a href="<?php echo base_url(); ?>operators/reset/<?php echo $operators[0]->getObjectId(); ?>" class="btn btn-large btn-warning">
                                            <i class="fa fa-repeat"></i> &nbsp; Reset Password
                                        </a>  
                                        <a href="<?php echo base_url(); ?>index.php/operators/" class="btn btn-large btn-success">
                                            <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index
                                        </a>

                                    </div>
                                </form>
                            </div> 
                            <div class="col-lg-6">
                                <img class='img-responsive col-centered center-block' src='<?php echo $operators[0]->get("operatorPicture")->getUrl(); ?>' alt="<?php echo $operators[0]->get("operatorPicture")->getName(); ?>"/><br>
                                <?php $suspended = $operators[0]->get("isSuspended"); ?>
                                <?php
                                if ($suspended==true){
                                    echo

                                    "<div class='alert alert-warning suspend'>
                                    SUSPENDED</div>";
                                }
                                else {
                                    echo 
                                    " ";
                                }

                                ?>


                            </div>
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
include 'edit-footer.php';
?>
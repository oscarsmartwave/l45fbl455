<?php
include APPPATH.'libraries/header.php';
// die('<pre>'.print_r($operators[46]->get("operatorPicture")->getUrl(), true));

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Operators</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo base_url(); ?>index.php/operators/add" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Operator</a>
                        <div class="panel-body">

                                <div class="dataTable_wrapper operators">
                            
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($operators as $operator)
                                            {
                                                echo 
                                                "
                                                    <tr>
                                                    <td>".
                                                        ((empty($operator->get("operatorPicture"))) ? 
                                                            "N / A" : 
                                                            "<img class='img-responsive col-centered' width=50% src='".$operator->get("operatorPicture")->getUrl()."' alt=".$operator->get("operatorPicture")->getName()."/>").
                                                    "</td>
                                                    <td>".$operator->get("email")."</td>
                                                    <td>".$operator->get("lastName")."</td>
                                                    <td>".$operator->get("firstName")."</td>
                                                    <td>".$operator->get("homeAddress")."</td>
                                                    <td>".$operator->get("phoneNumber")."</td>
                                                    <td>
                                                    <a href='".base_url()."operators/edit/".$operator->getObjectId()."'>EDIT</i></a>
                                                    <a href='".base_url()."operators/suspended/".$operator->getObjectId()."'>SUSPEND</i></a>
                                                    <a href='".base_url()."operators/delete/".$operator->getObjectId()."'>DELETE</i></a>
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
include APPPATH.'libraries/footer.php';
?>

<?php
include APPPATH.'libraries/header.php';
// die('<pre>'.print_r($users, true));
?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Deactivated Users</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <div class="dataTable_wrapper users table-responsive">
                        
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Email</td>
                                            <th>Address</th>
                                            <th>Contact Number</th>
                                            <th>View Cars</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($users as $row)
                                        {
                                            echo
                                            "
                                            <tr>
                                                <td>".$row->getUsername()."
                                                </td>
                                                <td>".$row->get("lastName")."
                                                </td>
                                                <td>".$row->get("firstName")."
                                                </td>
                                                <td>".$row->getEmail()."
                                                </td>
                                                <td>".$row->get("homeAddress")."
                                                </td>
                                                <td>".$row->get("phoneNumber")."
                                                </td>
                                                <td><a href='".base_url()."cars/getUserCar/".$row->getObjectId()."'>CARS</a>
                                                </td>
                                                <td><a href='".base_url()."users/activate/".$row->getObjectId()."'>ACTIVATE</a>
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

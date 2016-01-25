<body id="package">
    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Packages</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo base_url(); ?>index.php/packages/add" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Package</a>
                        <div class="panel-body">

                                <div class="dataTable_wrapper">
                            
                                    <table class="table table-striped table-bordered table-hover" id="packagesTable">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Cost</th>
                                                <th>Est. Wash Time</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($packages as $package)
                                            {
                                                echo "
                                                <tr>
                                                <td>".$package->get("title")."</td>
                                                <td>".$package->get("detail")."</td>
                                                <td>".$package->get("price")."</td>
                                                <td>".$package->get("estTime")."</td>
                                                <td>
                                                    <a href='".base_url()."packages/edit/".$package->getObjectId()."/'>EDIT</a><BR>
                                                    <a href='".base_url()."packages/price/".$package->getObjectId()."/'>EDIT PRICE</a>
                                                    <a href='".base_url()."packages/delete/".$package->getObjectId()."/'>DELETE</a>
                                                </td>";
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
    </div>
    <!-- /#wrapper -->
</body>

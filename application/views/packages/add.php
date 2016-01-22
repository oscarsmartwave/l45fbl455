<body>
    <div id="wrapper">
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Package</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default panel-body-bg">
                            <div class="panel-heading">
                                
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="<?php echo base_url(); ?>packages/add/" method="post">
                                            <div class="form-group">
                                                <label for="title">Title : </label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Package Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price: </label>
                                                <input type="text" class="form-control" name="priceNum" id="priceNum" placeholder="Package Price" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="estTime">Est. Wash Time: </label>
                                                <input type="number" class="form-control" name="estTime" id="estTime" placeholder="Estimated Wash Time" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea name="details" id="details" class="form-control" rows="3" placeholder="Package Details" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="createNew">
                                                    <span class="glyphicon glyphicon-plus"></span> Create New Record
                                                </button>  
                                                <a href="<?php echo base_url(); ?>index.php/packages" class="btn btn-large btn-success">
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

    </div>
</body>

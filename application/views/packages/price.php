<body>
    <div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Price</h1>
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url(); ?>packages/price/<?php echo $packages[0]->getObjectId(); ?>" method="post">
                                        <div class="form-group">
                                            <label for="title">Title : </label>
                                            <input type="text" class="form-control" name="title" placeholder="Package Title" value="<?php echo $packages[0]->get("title"); ?>" readonly="readonly" >
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price: </label>
                                            <input type="text" class="form-control" name="priceNum" placeholder="Package Price" value="<?php echo $packages[0]->get("priceNum"); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="estTime">Est. Wash Time: </label>
                                            <input type="text" class="form-control" name="estTime" placeholder="Estimated Wash Time" value="<?php echo $packages[0]->get("estTime"); ?>" readonly="readonly" >
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea name="detail" class="form-control" rows="3" placeholder="Package Details" readonly="readonly"><?php echo $packages[0]->get("detail"); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="objectId" value="<?php echo $packages[0]->getObjectId(); ?>">
                                            <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-edit"></span> Update Record
                                            </button>  
                                        <a href="<?php echo base_url(); ?>packages" class="btn btn-large btn-success">
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
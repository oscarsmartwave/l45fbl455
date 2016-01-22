<body>
    <div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Remove Package</h1>
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
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Est. Time Wash</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            if(isset($packages))
                            {
                                echo "
                                <tr>
                                    <td>".$packages[0]->get("title")."
                                    </td>
                                    <td>".$packages[0]->get("price")."
                                    </td>
                                    <td>".$packages[0]->get("estTime")."
                                    </td>
                                    <td>".$packages[0]->get("detail")."
                                    </td>
                                </tr>";
                            }
                            else if(isset($Message))
                            {
                                echo "
                                <tr>
                                    <td colspan=4>".$Message."
                                    </td>
                                </tr>
                                ";
                            }
                            ?>
                                </tbody>
                            </table>
                            <div class="container">
                            <p>
                            <?php
                            if(isset($packages))
                            {
                                ?>
                                <form method="post">
                                <input type="hidden" id="objectId" name="objectId" value="<?php echo $packages[0]->getObjectId(); ?>" />
                                <button class="btn btn-large btn-primary" type="button" id="btnDeletePackage" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
                                <a href="<?php echo base_url(); ?>index.php/packages/" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
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
    </div>
</body>

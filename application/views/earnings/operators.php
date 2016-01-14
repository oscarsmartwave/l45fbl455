<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 clas="page-header">Per Operator</h4>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    BAR GRAPH
                                </div>
                                <div class="panel-body">
                                    <div id="bar"></div>
                                    <img src="http://placehold.it/920x400" class="center-block img-responsive">
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Operators
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(count($operators) > 0)
                                                    {
                                                        foreach($operators as $operator)
                                                        {
                                                            echo 
                                                            "<tr>
                                                                <td>".$operator->getUsername()."</td>
                                                                <td>".$operator->get("lastName")."</td>
                                                                <td>".$operator->get("firstName")."</td>
                                                                <td><a href=".base_url()."earnings/operators/".$operator->getObjectId().">VIEW</td>
                                                            </tr>";
                                                        }
                                                    }
                                                    else { echo "No Record Found."; }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive --> 
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div> <!-- /.col-lg-12 -->    
            </div><!-- /.col-lg-12 -->
        </div> <!-- /.page-wrapper -->
    </div> <!-- /#wrapper -->

</body>
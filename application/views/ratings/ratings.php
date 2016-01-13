<body>
    <div id ="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ratings</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                            <div class="dataTable_wrapper users">
                        
                                <table class="table table-striped table-bordered table-hover" id="ratingsTable">
                                    <thead>
                                        <tr>
                                            <th>LB User</th>
                                            <th>LB Operator</th>
                                            <th>Rating</th>
                                            <th>Comments</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for($i = 0; $i < count($ratings); $i++)
                                        {
                                            echo
                                            "
                                            <tr>
                                                <td>".$ratings[$i]->get("user")->get("firstName")." ".$ratings[$i]->get("user")->get("lastName")."
                                                </td>
                                                <td>".$ratings[$i]->get("operator")->get("firstName")." ".$ratings[$i]->get("operator")->get("lastName")."
                                                </td>
                                                <td>".$ratings[$i]->get("rating")."
                                                </td>
                                                <td>".$ratings[$i]->get("comments")."
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
    </div>
</body>
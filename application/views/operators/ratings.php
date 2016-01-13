<body>
    <div id ="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Operator Ratings</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">

                                <div class="dataTable_wrapper">
                            
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Rating Count</th>
                                                <th>Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($ratings as $rating)
                                            {
                                                    echo "<tr>
                                                    <td>".$rating->get("email")."</td>
                                                    <td>".$rating->get("lastName")."</td>
                                                    <td>".$rating->get("firstName")."</td>
                                                    <td>".$rating->get("count")."</td>
                                                    <td>".$rating->get("rating")."</td>
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

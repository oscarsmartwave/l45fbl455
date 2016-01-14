<body>
    <div id="wrapper">


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Car Makes</h1>
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
                                                <th>Make</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($makes as $val)
                                            {
                                                echo 
                                                "
                                                <tr>
                                                    <td>".$val->name."
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
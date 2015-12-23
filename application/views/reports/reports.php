<?php
include APPPATH.'/libraries/header.php';
?>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Reports</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row appointed">
            <div class="col-lg-12">
                <div class="panel-body">

                    <div class="dataTable_wrapper">

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Reason</th>
                                    <th>User</th>
                                    <th>Date Created</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              for($i = 0; $i < count($reports); $i++)
                              {
                                $newDate = date_format($reports[$i]->getCreatedAt(), "j F Y");
                                echo
                                "
                                <tr>
                                    <td>".$reports[$i]->get("reason")."
                                    </td>
                                    <td>".$reports[$i]->get("user")->get("firstName")." ".$reports[$i]->get("user")->get("lastName")."
                                    </td>
                                    <td>".$newDate."
                                    </td>
                                    <td>".$reports[$i]->get("operator")->get("firstName")." ".$reports[$i]->get("operator")->get("lastName")."
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
include APPPATH.'/libraries/footer.php';
?>

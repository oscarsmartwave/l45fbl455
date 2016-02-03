<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url()."earnings/operators"; ?>">Back to all Operators</a><h4 class="page-header" id="operatorId"><?php echo ($operator->Message == "NO_RECORD_FOUND")? "No Record found" : $operator->Data->operator->firstName ." ". $operator->Data->operator->lastName; ?></h4>
                    <dr>
                        <div class="row">
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
                        </div>
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
                                                    <th>Location</th>
                                                    <th>Package</th>
                                                    <th>Model</th>
                                                    <th>Car</th>
                                                    <th>Owner</th>
                                                    <th>Time Start</th>
                                                    <th>Time End</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                // if($operator->Message == "SUCCESS")
                                                if(count($operator->Data->orders) > 0)
                                                {
                                                    foreach($operator->Data->orders as $val)
                                                    {
                                                        echo"<tr>
                                                        <td>".$val->locationString."</td>
                                                        <td id='".$val->packageObjectId."'></td>
                                                        <td id='".$val->carObjectId."'></td>
                                                        <td id='".$val->carObjectId."'></td>
                                                        <td id='".$val->userObjectId."'></td>
                                                        <td>".$val->startedAt."</td>
                                                        <td>".$val->endedAt."</td>
                                                        </tr>";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<td class='no-record-found' colspan='7'>No Record Found</td>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                        <div class="col-lg-12">
                                            Total Earnings of operator : <span class="pull-right"> <?php echo (isset($operator->Data->sum) ? $operator->Data->sum : "n/a" ); ?> </span>
                                        </div>
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </div> <!-- /.col-lg-12 -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.page-wrapper -->

        </div> <!-- /#wrapper -->
    </body>
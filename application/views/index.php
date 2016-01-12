<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Operator's Current Task
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">View</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>

                    </div> <!-- pull-right -->
                </div> <!-- panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="operatorsCurrentTasks">
                            <thead>
                                <td>
                                    Operator
                                </td>
                                <td>
                                    Location
                                </td>
                                <td>
                                    Car Make
                                </td>
                                <td>
                                    License
                                </td>
                                <td>
                                    Owner
                                </td>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                        </table>
                    
                    </div> <!-- table-responsive -->
                </div> <!-- /.panel-body -->
            </div><!-- panel-default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Available Operators
                </div> <!-- /.panel panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-bordered table-hover table-striped" id="operatorsAvailable">
                            <thead>
                                <td>
                                    Operator
                                </td>
                                <td>
                                    Current Location
                                </td>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div> <!-- /.dataTable_wrapper -->
                </div> <!-- /.panel-body -->
            </div> <!-- /.panel .panel-default -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Bookings for the Day
                </div> <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-bordered table-hover table-striped" id="bookingsForTheDay">
                            <thead>
                                <td>
                                    Location
                                </td>
                                <td>
                                    Time
                                </td>
                                <td>
                                    Car Make
                                </td>
                                <td>
                                    License
                                </td>
                                <td>
                                    Owner
                                </td>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div><!-- panel-body -->
            </div> <!-- /.panel panel-default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Timeline
                </div>
                <div class="panel-body">
                    <ul class="timeline" id="lb-timeline">

                    </ul>
                </div> <!-- /.panel-body -->
            </div> <!-- /.panel.panel-default -->
        </div> <!-- col-lg-8 -->

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Notifications Panel
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small"><em>4 minutes ago</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small"><em>12 minutes ago</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small"><em>27 minutes ago</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small"><em>43 minutes ago</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small"><em>11:32 AM</em>
                            </span>
                        </a>
                    </div><!-- /.list-group-->
                </div><!-- /.panel-body -->
            </div> <!-- /.panel .panel-default -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart">Donut Chart</div>
                    <a href="#" class="btn btn-default btn-block">View Details</a>
                </div>
            </div>
        </div><!-- /.col-lg-4 -->
    </div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php

include 'footer.php';

?>

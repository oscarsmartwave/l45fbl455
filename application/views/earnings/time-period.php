<?php
include APPPATH.'libraries/header.php';
    //die('<pre>'.print_r($appointmentsTimeline, true));
?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <h4 clas="page-header">Per Operator</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        SELECT DATE :
                    </div>
                    <div class = "panel-body">
                        <div class="form-inline col-centered">
                            <div class="form-group">
                                <label class="sr-only" for="year">SELECT YEAR:</label>
                                <select class="form-control" name="year" id="years">
                                    <option value = 0 >-- YEAR --</option>
                                    <?php
                                    for($i = 0; $i <= 30; $i++)
                                    {
                                        $year = date("Y")-$i;
                                        echo "<option value=".$year.">".$year."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="year">SELECT MONTH:</label>
                                <select class="form-control" name="month" id="months">
                                    <option value = 0 >-- MONTH --</option>
                                    <?php
                                    for($i = 1; $i <= 12; $i++)
                                    {
                                        $dateObj   = DateTime::createFromFormat('!m', $i);
                                        $monthName = $dateObj->format('F');
                                        echo "<option value=".$i.">".$monthName."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="year">SELECT DAY:</label>
                                <select class="form-control" name="day" id="days">
                                    <option value = 0 >-- DAY --</option>
                                </select>
                            </div>                                
                            <button class="btn btn-default" id="btnGo">GO</button>
                        </div>
                    </div>
                </div><!-- /.panel.panel-default -->
                <div class="panel panel-default">
                    <div class = "panel-heading">
                        TABLE
                    </div>
                    <div class="panel-body" id="table-container">
                        


                    </div><!-- /.panel-body -->
                </div><!-- /.panel.panel-default -->
            </div><!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.page-wrapper -->
</div><!-- /#wrapper -->
<?php


include 'time-period-footer.php';

// include 'footer.php';

?>

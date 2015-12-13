<?php
include APPPATH.'libraries/header.php';

//die('<pre>'.print_r($results, true));
foreach ($appointments as $row)
{
    foreach ($row as $val) 
    {
        $id = $val->objectId;
    }
    
}
?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Select Operator</h1>
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
                                        <th>Location</th>
                                        <th>Model</th>
                                        <th>License</th>
                                        <th>Color</th>
                                        <th>Owner</th>
                                        <th>Appt Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($appointments as $row)
                                    {
                                        foreach ($row as $val) 
                                        {
                                            $apptDate = $val->apptDate->iso;
                                            $date = strtotime($apptDate);
                                            $date = date('l, F jS Y \a\t g:ia', $date);

                                            echo
                                                '<tr>
                                                <td>'.$val->apptLocation.'</td>
                                                <td>'.$val->carId->model.'</td>
                                                <td>'.$val->carId->license.'</td>
                                                <td>'.$val->carId->color.'</td>
                                                <td>'.$val->carId->ownerId->lastName.'</td>
                                                <td>'.$date.'</td>
                                                </tr>';
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <div class="container">
                            <p>
                            <?php
                            if($id)
                            {
                                ?>
                                <form method="post" action="<?php echo base_url(); ?>index.php/appointments/assignment/<?php echo $id; ?>">
                                <h4>Operators</h4>
                                <?php
                                    foreach ($operators as $row) 
                                    {
                                        foreach($row as $val)
                                        {
                                            echo
                                            '<div class="radio">
                                            <label class="radio-inline">
                                                <input type="radio" name="operator" id="operator" value="'.$val->objectId.'" checked>'.$val->username.'
                                            </label>
                                            </div>
                                            ';
                                        }
                                    }
                                ?>
                                <button class="btn btn-large btn-primary" type="submit"><i class="glyphicon glyphicon-plus"></i> &nbsp; SELECT</button>
                                <a href="<?php echo base_url(); ?>index.php/appointments/unassigned" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
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
    
<?php
include APPPATH.'libraries/footer.php';
?>

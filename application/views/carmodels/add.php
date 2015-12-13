<?php
include APPPATH.'libraries/header.php';




//die('<pre>'.print_r($carMakesData, true));

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Car Models</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Car Model
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url(); ?>index.php/carmodels/add/" method="post">
                                        <div class="form-group">
                                            <label for="title">Model : </label>
                                            <input type="text" class="form-control" name="model" placeholder="Car Model">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Car Make: </label>
                                            <select class="form-control" name="carMake">
                                                <?php
                                                   foreach($carMakes as $row)
                                                    {
                                                        foreach($row as $val)
                                                        {
                                                            echo '<option value="'.$val->carMake.'">'.$val->carMake.'</option>';
                                                        }  
                                                    }
                                                ?>
                                            </select>    
                                        </div>
                                        <div class="form-group">
                                            <label for="estTime">Car Type: </label>
                                            <select class="form-control" name="carType">
                                                <?php
                                                   foreach($carTypes as $row)
                                                    {
                                                        foreach($row as $val)
                                                        {
                                                            echo '<option value="'.$val->carType.'">'.$val->carType.'</option>';
                                                        }  
                                                    }
                                                ?>
                                            </select>    
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-plus"></span> Create New Record
                                            </button>  
                                        <a href="<?php echo base_url(); ?>index.php/packages" class="btn btn-large btn-success">
                                            <i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index
                                        </a>
            
                                        </div>
                                    </form>
                                </div> <!-- /.col-lg-6 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.panel-body -->
                        </div> <!-- /.panel -->
                    </div> <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    
<?php
include APPPATH.'/libraries/footer.php';
?>

<?php
include APPPATH.'libraries/header.php';

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Operator</h1>
                    </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Operator
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url(); ?>index.php/cartypes/edit/<?php echo $id; ?>" method="post">
                                        <?php
                                        foreach($cartypes as $row)
                                        {
                                            foreach($row as $val)
                                            {
                                            ?>
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="carType" value="<?php echo $val->carType; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="priceMultiplier" placeholder="Price Multiplier" value="<?php echo $val->priceMultiplier; ?>">
                                                <input type="hidden" class="form-control" name="objectId"  value="<?php echo $val->objectId; ?>">
                                            </div>
                                            <?php                                                
                                            }
                                        }
                                        ?>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-edit"></span> Update Record
                                            </button>  
                                        <a href="#" class="btn btn-large btn-success">
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
include APPPATH.'libraries/footer.php';
?>

<!-- jQuery -->
</div>
<!-- /#wrapper -->
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/bootstrap-switch.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/bootstrap-switch.min.js"></script>
    
    <!-- Flot Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/appointments/js/operators_graph.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $(".YesNoSwitch").bootstrapSwitch({
            onText: 'Yes',
            offText: 'No'
        });
        $("[name='enableExpiry']").bootstrapSwitch({
            onText: 'Yes',
            offText: 'No'
        });
        $("[name='messageType']").bootstrapSwitch({
            onText: 'Plain Text',
            offText: 'JSON'
        });
		

    });
    </script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
    <!-- Morris Charts JavaScript
    <script src="<?php echo base_url();?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris-data.js"></script> -->

    
</body>

</html>
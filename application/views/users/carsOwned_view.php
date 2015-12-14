<?php
include APPPATH.'libraries/header.php';
// die('<pre>'.print_r($users, true));
?>


<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User: </h1>
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
									<th>Cars Owned</th>
								</tr>
							</thead>
							<tbody>
								<tr><?php 
										foreach ($carsOwned as $key => $value) {
											# code...
										}
										?>
									<td>
										<?php echo $value->model; ?>
									</td>
								</tr>
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

include APPPATH.'libraries/footer.php';
?>

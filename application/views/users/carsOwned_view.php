<body>
	<div id="wrapper">
		<!-- Page Content -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Registered Cars
						</h1>
						<h3>
						<?php 
							echo "Owner: ".ucfirst($user->get("lastName")).", ".ucfirst($user->get("firstName"))." (".$user->getUsername().")";
							?>	
						</h3>
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
											<th>Car Make</th>
											<th>Model</th>
											<th>Size</th>
											<th>Color</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach($cars as $row)
										{
											echo
											"
											<tr>
												<td>".$row->get("make")."
												</td>
												<td>".$row->get("model")."
												</td>
												<td>".$row->get("size")."
												</td>
												<td>".$row->get("color")."
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
<?php
    include APPPATH.'libraries/header.php';
    //die('<pre>'.print_r($appointmentsTimeline, true));
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Push Notification
                        </div><!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <form role="form">
								<!-- Recepients -->
                                <div class="panel panel-default text-center">
                                    <div class="panel-heading">
                                        Choos your Recepients
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead class="center">
                                                    <th>
                                                    </th>
                                                    <th>AUDIENCE
                                                    </th>
                                                    <th>SIZE
                                                    </th>
                                                    <th>CREATED
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td> EVERYONE
                                                        </td>
                                                        <td> (SIZE)
                                                        </td>
                                                        <td> (DATE)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="rbCustomAudience" id="rbCustomAudience" value="2">
                                                                </label>
                                                            </div>
                                                        </td >
                                                        <td> CUSTOM
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
									</div> <!-- /.panel-body -->
									<div class="panel-body">
										<div class="pushHeader"><span class="cancel"> cancel </span>CHOOSE PLATFORMS
										</div>
										<h4>IOS</h4>
										INSTALLATION CONDITIONS
										<div class="form-group">
										<select class="form-control push">
											<option value="localeIdentifier">localeIdentifier</option>
											<option value="GCMSenderId">GCMSenderId</option>
											<option value="appIdentifier">appIdentifier</option>
											<option value="appName">appName</option>
											<option value="appVersion">appVersion</option>
											<option value="badge">badge</option>
											<option value="channels">channels</option>
											<option value="installationUser">installationUser</option>
											<option value="parseVersion">parseVersion</option>
											<option value="pushType">pushType</option>
											<option value="timeZone">timeZone</option>
											<option value="user">user</option>
											<option value="alert">alert</option>
											<option value="createdAt">createdAt</option>
											<option value="updatedAt">updatedAt</option>
										</select>
										<select class="form-control push">
											<option value="contains any of">contains any of</option>
											<option value="does not contain any of">does not contain any of</option>
											<option value="contains all of">contains all of</option>
											<option value="contains number">contains number</option>
											<option value="does not contain number">does not contain number</option>
											<option value="exists">exists</option>
											<option value="does not exist">does not exist</option>
										</select>
										<input type="text" class="form-control push" name="push_condition">
										</div>
									</div><!-- /.panel-body -->
                                        <div class="panel-body">
											<span class="pull-left"> Save Audience?</span> <span class="pull-right"><input class="YesNoSwitch" type="checkbox" id="saveAudience" name="saveAudience"></span>
                                        </div>
										<div class="panel-body">
											<span = class="pull-left"> Audience Name</span> <span class="pull-right"><input class="form-control push" type="text" id="nameAudience" name="nameAudience"></span>
										</div>
									<div class="panel-footer">
                                        Will be sent to (count) device/s
                                    </div>
								</div>
                                    
								<!-- A/B TESTING -->
                                <div class="panel panel-default text-center">
                                    <div class="panel-heading">
                                        A/B Testing
                                        <p>
                                        Experiment with different messages or send times todiscover the optimal campaign variables.</p>
                                    </div>
                                    <div class="panel-body">
                                        <span class="pull-left">Use A/B Testing</span> <span class="pull-right"><input class="YesNoSwitch" type="checkbox" name="enableAb" checked></span>
                                    </div>
                                </div>
								<!-- Delivery Time -->
                                <div class="panel panel-default text-center">
                                    <div class="panel-heading">
                                        Choose a Delivery time
                                        <p>We can send the campaign immediately, or any time in the next 2 weeks.
                                        </p>
                                    </div>
                                    <div class="panel-body" >
                                       <div class="btn-group" data-toggle="buttons">
											<label class="btn btn-primary push active">
												<input type="radio" class="deliveryTime" name="options" id="option1" autocomplete="off" checked>
													<div class="clear-fix">
														<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
														<br />
														NOW
													</div>
											</label>
										  
											<label class="btn btn-primary push">
												<input type="radio" class="deliveryTime" name="options" id="option2" autocomplete="off">
													<div ="clear-fix">
														<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>
														<br />
														LATER
													</div>
											</label>

										</div><!-- /.btn-group -->
                                    </div><!-- /.panel-body -->
                                    <div class="panel-body">
                                        <span class="pull-left">Expires</span> <span class="pull-right"><input class="YesNoSwitch" type="checkbox" name="enableExpiry" checked></span>
                                    </div>
                                </div>
                                <div class="panel panel-default text-center">
                                    <div class="panel-heading">
                                        Write Your Message
                                        <p>The best campaigns use short and direct messaging.
                                        </p>
                                    </div>
                                    <div class="panel-body">
                                        <textarea class="form-control">

                                        </textarea>
                                    </div>
                                    <div class="panel-body" >
                                        <span class="pull-left">Message Type</span> <span class="pull-right"><input type="checkbox" name="messageType" checked></span>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body ">
										<div class="col-lg-12">
											<div class="push-preview">
											
											</div>
										</div>
								   </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Ready to send your campaign?
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-send"></span> SEND CAMPAIGN
                                            </button>
                                        </div>
                                        <div class="alert alert-success">
                                            Campaign Send <a href="#" class="alert-link">Alert Link</a>.
                                        </div>
                                        <div class="alert alert-warning">
                                            Error Message <a href="#" class="alert-link">Alert Link</a>.
                                        </div>
                                        <div class="alert alert-danger">
                                            Sending Failed <a href="#" class="alert-link">Alert Link</a>.
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php

    include APPPATH.'libraries/footer.php';

?>

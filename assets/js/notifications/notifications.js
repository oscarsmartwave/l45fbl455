$(function(){
	var http = location.protocol;
	var slashes = http.concat("//");
	var host = slashes.concat(window.location.hostname);

	var notifUrl = host+"/leafblast/notifications/";
	
	$(".YesNoSwitch").bootstrapSwitch({
            onText: 'Yes',
            offText: 'No'
	});


	$("#btnTimeZone").click(function(event){
		console.log(notifUrl+"timezone");
		$("#btnTimeZone").prop("disabled", true);
		$.post(
			notifUrl+"timezone",
			{
				timezone: $("#timezone").val(),
				message: $("#message").val()
			},
			function(response)
			{

			}, "JSON"
		)
		.done(function(data) {
			if(data.Status == "SUCCESS")
			{
				$("<div title='Push'>Push Success</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
			}
			else
			{
				$("<div title='Push'>Push Failed</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
			}
			$("#btnTimeZone").prop("disabled", false);
		})// done
		.fail(function(error, status){
			$("<div title='Push'>Push Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});
			$("#btnTimeZone").prop("disabled", false);
		})
	});

	$("#btnPushToAll").click(function(event){
		console.log(notifUrl+"all");
		$("#btnPushToAll").prop("disabled", true);
		$.post(
			notifUrl+"all",
			{
				message: $("#message").val()
			},
			function(response)
			{

			}, "JSON"
		)
		.done(function(data) {
			if(data.Status == "SUCCESS")
			{
				$("<div title='Push'>Push Success</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
				$("#pushToAllForm").trigger("reset");
			}
			else
			{
				$("<div title='Push'>Push Failed</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
			}
			$("#btnPushToAll").prop("disabled", false);
		})// done
		.fail(function(error, status){
			console.log(error);
			$("<div title='Push'>Push Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});
			$("#btnPushToAll").prop("disabled", false);
		})
	});

	$.get(notifUrl+"users", {}, function(response){}, "JSON")
	.done(function(data){

		var users = $("select#users");
		$.each(data, function(index, item) {
			  users.append(new Option(item.lastName +', '+item.firstName, item.objectId));
		});

	}) // done
	.fail(function(data){

		console.log(data);

	});

	$("#btnPushToUser").click(function(event){
		console.log(notifUrl+"user");
		$("#btnPushToUser").prop("disabled", true);
		$.post(
			notifUrl+"all",
			{
				user: $("select#users option:selected").val(),
				message: $("#message").val()
			},
			function(response)
			{

			}, "JSON"
		)
		.done(function(data) {
			if(data.Status == "SUCCESS")
			{
				$("<div title='Push'>Push Success</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
				$("#pushToUserForm").trigger("reset");
			}
			else
			{
				$("<div title='Push'>Push Failed</div>").dialog({
					modal: true,
					open: function(){
						
					},
	    			close: function(){ 
	    				
	    			}
				});
			}
			$("#btnPushToUser").prop("disabled", false);
		})// done
		.fail(function(error, status){
			console.log(error);
			$("<div title='Push'>Push Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});
			$("#btnPushToUser").prop("disabled", false);
		})
	});

});
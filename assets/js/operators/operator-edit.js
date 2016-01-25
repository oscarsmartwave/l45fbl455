$(function(){
	var http = location.protocol;
	var slashes = http.concat("//");
	var host = slashes.concat(window.location.hostname);

	var optrUrl = host+"/leafblast/operators/";
	// var optrUrl = "http://52.24.133.167/leafblast/operators/";

	$("#btnUpdate").click(function(event){
		console.log("btnUpdate clicked !");
		var optrObjectId = $(".formEdit").attr("id"); //retrieve object id

		var email = $("#email").val();
		var username = $("input#username").val();
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var homeAddress = $("#homeAddress").val();
		var phoneNumber = $("#phoneNumber").val();

		$.post(
			optrUrl+"edit/"+$(".formEdit").attr("id"), 
			{
				objectId: $(".formEdit").attr("id"),
				email: $("#email").val(),
				username: $("input#username").val(),
				firstName: $("#firstName").val(),
				lastName: $("#lastName").val(),
				homeAddress: $("#homeAddress").val(),
				phoneNumber: $("#phoneNumber").val()
			}, 
			function(response)
			{
				
			},'JSON'
		) // end $.post();
		.done(function(data)
		{
			console.log(data);
		}) // done
		.fail(function(error, status)
		{
			console.log(error);
		}) // failed


	}); // #btnUpdate

	$("#btnDelete").click(function(event){
		console.log("btnDelete clicked");
		var optrObjectId = $("#objectId").val();

		$.post(
			optrUrl+"delete/"+optrObjectId, 
			{
				objectId: optrObjectId,
			}, 
			function(response)
			{
				
			},'JSON'
		) // end $.post();
		.done(function(data)
		{
			console.log("DONE");
			// window.location.replace(optrUrl);
			// $("#cover").fadeIn(100);
			$("<div title='Operator Deleted'>Operator Deleted</div>").dialog(
				{
					modal: true,
					open: function(){
						$("#btnUpdate").prop("disabled", true);
					},
        			close: function(){ 
        				console.log("modal closed");
        			}
				});
		}) // done
		.fail(function(error, status)
		{
			console.log(error);
		}) // failed

	});

	$("#btnSuspend").click(function(){
		console.log("btnSuspend Deleted");
		var optrObjectId = $("#objectId").val();
		$.post(
			optrUrl+"suspended/"+optrObjectId,
			{ 
				objectId: optrObjectId 
			},
			function(response)
			{

			}, 'JSON'
		)
		.done(function(data){
			console.log(data);
			$("<div title='Suspend'>Operator Suspended</div>").dialog({
				modal: true,
				open: function(){
					$("#btnUpdate").prop("disabled", true);
				},
    			close: function(){ 
    				console.log("modal closed");
    			}
			})
		})
		.fail(function(error, status){
			console.log(error);
			$("<div title='Suspend'>Error</div>").dialog({
				modal: true,
				open: function(){
					$("#btnUpdate").prop("disabled", true);
				},
    			close: function(){ 
    				console.log("modal closed");
    			}
			})
		})
	

	}); // #btnSuspend click

});
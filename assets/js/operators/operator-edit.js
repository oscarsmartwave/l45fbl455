$(function(){

	var optrUrl = "http://localhost/leafblast/operators/edit/";
	// var optrUrl = "http://52.24.133.167/leafblast/operators/edit/";

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
			optrUrl+$(".formEdit").attr("id"), 
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
		.done(function(data){
			
		}) // done
		.fail(function(error, status)
		{
			console.log(error);
		}) // failed


	});

});
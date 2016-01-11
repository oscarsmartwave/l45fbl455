$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");

	$("#createNew").click(function(event){
		event.preventDefault();

		var _User = Parse.Object.extend("_User");
		var user = new _User();

		var email = $("#email").val();
		var username = $("input#username").val();
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var homeAddress = $("#homeAddress").val();
		var phoneNumber = $("#phoneNumber").val();

		user.set("email", email);
		user.set("username", username);
		user.set("password", "leafblast");
		user.set("firstName", firstName);
		user.set("lastName", lastName);
		user.set("homeAddress", homeAddress);
		user.set("phoneNumber", phoneNumber);
		user.set("isOperator", true);
		user.set("isRemoved", false);
		user.set("isSuspended", true);
		user.set("isFirstTime", true);
		user.set("isDeactivated", true);

		user.save(null, {
			success: function(user) {
				alert('Successfully created Operator Account. \nobjectId: ' + user.id);
				location.reload();
			},
			error: function(user, error) {
				alert('Failed to create Account! \nError: ' + error.message);
				location.reload();
			}
		});

	});

});
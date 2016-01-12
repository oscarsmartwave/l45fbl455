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

		var fileUploadControl = $("#uploadPhoto")[0]; 
		if (fileUploadControl.files.length > 0) { // parse image
			var file = fileUploadControl.files[0];
			var name = username+".jpg";

			var parseFile = new Parse.File(name, file);
		}

		parseFile.save().then(function() { // save image in parse

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
			user.set("operatorPicture", parseFile);

			user.save(null, {
				success: function(user) {
					user.save(); // save changes
					alert('Successfully created Operator Account. \nobjectId: ' + user.id);
					location.reload();
				},
				error: function(user, error) {
					alert('Failed to create Account! \nError: ' + error.message);
					location.reload();
				}
		}); // end user save

		}, function(error) {
			console.log(error.message);
		}); // end parseFile save

	}); // end click event

});
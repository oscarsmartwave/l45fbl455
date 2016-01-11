$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg", "huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu");

	$("#btnUpdate").click(function(event){
		event.preventDefault();

		var _User = Parse.Object.extend("_User");
		var optr = new Parse.Query(_User);
		var user = new _User();

		var optrObjectId = $(".formEdit").attr("id");

		var email = $("#email").val();
		var username = $("input#username").val();
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var homeAddress = $("#homeAddress").val();
		var phoneNumber = $("#phoneNumber").val();

		optr.get(optrObjectId, {
			success: function(user)
			{

				var _password = user.get("password");
				// alert(_password);

				user.set("email", email);
				user.set("username", username);
				user.set("password", _password);
				user.set("firstName", firstName);
				user.set("lastName", lastName);
				user.set("homeAddress", homeAddress);
				user.set("phoneNumber", phoneNumber);
				user.set("isOperator", true);

				user.save(null, {
					success: function(user) {
						alert('Successfully updated Operator Account. \nobjectId: ' + user.id);
						location.reload();
					},
					error: function(user, error) {
						console.log('Failed to update Account! \nError: ' + error.message);
						location.reload();
					}
				});

			},
			error: function(object, error) 
			{
				console.log(error.message);
			}

		});//end users.get

	});

});
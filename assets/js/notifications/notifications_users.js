$(document).ready(function(){

	// console.log("pakoff");
    $(".YesNoSwitch").bootstrapSwitch({
        onText: 'Yes',
        offText: 'No'
    });

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");   
	
	var User = Parse.Object.extend("_User");
	var user = new User();
	var query = new Parse.Query(User);
	query.find({

		success: function(user) {
    		var users = $("#users");
			$.each(user, function(index, item) {
			  users.append(new Option(item.get("lastName") +', '+item.get("firstName"), item.id));
			});

		},
		error: function(object, error) {
			alert("failed!");
		}
	});

});
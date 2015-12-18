$(document).ready(function(){

	// console.log("pakoff");
	$(".YesNoSwitch").bootstrapSwitch({
		onText: 'Yes',
		offText: 'No'
	});

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");   
	
	// Parse.Cloud.useMasterKey();

	var TimeZone = Parse.Object.extend("_Installation");
	var timezone = new TimeZone();
	var query = new Parse.Query(TimeZone);
	// var query = new Parse.Query(Parse.Installation);
	query.find({

		success: function(timezone) {
			var timezones = $("#timezone");
			$.each(timezone, function(index, item) {
				timezones.append(new Option(item.get("timeZone"), item.id));
			});

		},
		error: function(error) {
			alert(error.message);
		}
	});

});
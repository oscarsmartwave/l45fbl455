$(function(){
	var API = "http://52.24.133.167/api.leafblast/api/v1/";
	console.log("Ready!");

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");
	var _User = Parse.Object.extend("_User");
	var _Car = Parse.Object.extend("Car");

	var users = new Parse.Query(_User);
	var cars = new Parse.Query(_Car);

	$('#years').change(function() {
		console.log($('#years').val());
	});
	
	$('#months').change(function(){
		console.log($('#months').val());

		var numOfDays = new Date($('#years').val(), $('#months').val(), 0).getDate();
		$("#days").empty();
		for(var i = 1; i <= numOfDays; i++)
		{
			$("#days").append(new Option(i, i));
		}
		$("#days").trigger("chosen:updated");
	});

	$('#btnGo').click(function(){

		var month = $('#months option:selected').val();
		var year = $('#years option:selected').val();
		var day = $('#days option:selected').val();

		if(month == 0 || year == 0 || day == 0)
		{
			console.log("No selected month, day, or year");
			return;
		}
		var getDate = year+"/"+month+"/"+day;
		console.log(getDate);

		$.post("http://52.24.133.167/api.leafblast/api/v1/history/date", { date : getDate })
		.done(function(data) { 
			console.log(data);

			var timeTable = $("<table class='table table-bordered table-hover table-striped' id='apptTable'>");
			$("#table-container").empty();
			var thead = $("<thead>"+
				"<td>Location</td>"+
				"<td>Package</td>"+
				"<td>Operator</td>"+
				"<td>Car</td>"+
				"<td>Model</td>"+
				"<td>Owner</td>"+
				"<td>Time Start</td>"+
				"<td>Time End</td>"+
				"</thead>");
			var tbody = $("<tbody></tbody>");
			$.each(data.Data, function(key, value){
				
				var row = $("<tr><td>"+value.locationString+
					"</td><td id='"+value.packageObjectId+"'>"+
					"</td><td id='"+value.optrObjectId+"'>"+
					"</td><td id='"+value.carObjectId+"'>"+
					"</td><td id='"+value.carObjectId+"'>"+
					"</td><td id='"+value.userObjectId+"'>"+
					"</td><td>"+value.startedAt+"</td>"+
					"<td>"+value.endedAt+"</td></tr>");
				tbody.append(row);
			});
			var table = timeTable.append(thead, tbody);
			$('#table-container').append(table);
			$("#table-container").trigger("chosen:updated");

			var _User = Parse.Object.extend("_User");
			var _Car = Parse.Object.extend("Car");
			var _Pkg = Parse.Object.extend("CarWashPackages");

			var users = new Parse.Query(_User);
			var cars = new Parse.Query(_Car);
			var pkg = new Parse.Query(_Pkg);

			$("#apptTable > tbody > tr").each(function(){

				var carObjectId = this.cells[3].id;
				var td_car = this.cells[3];
				var td_model = this.cells[4];

				var userObjectId = this.cells[5].id;
				var td_owner = this.cells[5];

				var packageObjectId = this.cells[1].id;
				var td_package = this.cells[1];

				var optrObjectId = this.cells[2].id;
				var td_optr = this.cells[2];

				cars.get(carObjectId, {
					success: function(car)
					{
						var model = car.get("model");
						var make = car.get("make");
						td_model.innerText = model;
						td_car.innerText = make;
					},
					error: function(object, error) 
					{
						alert(error);
					}
		}); // end cars.get

				users.get(userObjectId, {
					success: function(user)
					{
						var firstName = user.get("firstName");
						var lastName = user.get("lastName");

						td_owner.innerText = firstName + ' ' + lastName;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end users.get

				pkg.get(packageObjectId, {
					success: function(pkg)
					{
						var title = pkg.get("title");

						td_package.innerText = title;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end pkg.get

				users.get(optrObjectId, {
					success: function(optr)
					{
						var firstName = optr.get("firstName");
						var lastName = optr.get("lastName");

						td_optr.innerText = firstName + ' ' + lastName;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end opt.get

			});

$('#earningsTable').DataTable({
	responsive: true
});
});
});

});
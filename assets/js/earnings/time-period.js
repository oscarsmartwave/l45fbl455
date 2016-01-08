$(function(){
	var API = "http://52.24.133.167/api.leafblast/api/v1/";
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


		$.post("http://52.24.133.167/api.leafblast/api/v1/earnings/date", { date : getDate })
		.done(function(data) { 
			console.log(data);

			var timeTable = $("<table class='table table-bordered table-hover table-striped' id='earningsTable'>");
			$("#table-container").empty();
			var thead = $("<thead>"+
				"<td>Operator</td>"+
				"<td>Owner</td>"+
				"<td>Car License</td>"+
				"<td>Model</td>"+
				"<td>Made at</td>"+
				"</thead>");
			var tbody = $("<tbody></tbody>");
			$.each(data.Data, function(key, value){

				var row = $("<tr><td id='"+value.optrObjectId+"'>"+
					"</td><td id='"+value.userObjectId+"'>"+
					"</td><td id='"+value.carObjectId+"'></td>"+
					"</td><td id='"+value.carObjectId+"'></td>"+
					"<td>"+value.madeAt+"</td></tr>");
				tbody.append(row);
			});
			var table = timeTable.append(thead, tbody);
			$('#table-container').append(table);
			$("#table-container").trigger("chosen:updated");

			var _User = Parse.Object.extend("_User");
			var _Car = Parse.Object.extend("Car");

			var users = new Parse.Query(_User);
			var cars = new Parse.Query(_Car);

			$('#earningsTable > tbody  > tr').each(function(){

				var carObjectId = this.cells[2].id;
				var td_license = this.cells[2];
				var td_model = this.cells[3];

				var userObjectId = this.cells[1].id;
				var td_owner = this.cells[1];

				var optrObjectId = this.cells[0].id;
				var td_optr = this.cells[0];

				cars.get(carObjectId, {
					success: function(car)
					{
						var model = car.get("model");
						var license = car.get("license");
						td_model.innerText = model;
						td_license.innerText = license;
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

	}); // end each function

$('#earningsTable').DataTable({
	responsive: true
});
});
});

});	

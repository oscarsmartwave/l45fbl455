$(function(){
	var API = "http://localhost/api.leafblast/api/v1/";
	var API = "http://localhost/api.leafblast/api/v1/";
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
		for(var i = 1; i < numOfDays; i++)
		{
			$("#days").append(new Option(i, i));
		}
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

		$.post("http://localhost/api.leafblast/api/v1/earnings/date", { date : getDate })
			.done(function(data) { 
				console.log(data);
				
				var timeTable = $("<table class='table table-bordered table-hover table-striped' id='earningsTable'>");
				var thead = $("<thead>"+
									"<td>Operator</td>"+
									"<td>Owner</td>"+
									"<td>Car License</td>"+
									"<td>Model</td>"+
									"<td>Made at</td>"+
								"</thead>");
				var tbody = $("<tbody></tbody>");
				$.each(data.Data, function(key, value){
					var row = $("<tr><td>"+value.optrObjectId+
								"</td><td>"+value.userObjectId+
								"</td><td id='"+value.carObjectId+"'></td>"+
								"</td><td id='"+value.carObjectId+"'></td>"+
								"<td>"+value.madeAt+"</td></tr>");
					tbody.append(row);
				});
				var table = timeTable.append(thead, tbody);
				var divTimeTable = $("<div id='time-table'>").append(table);
				var tableResponsive = $("<div class='table-responsive'>").append(divTimeTable);
				$('#table-container').append(tableResponsive);

				$('#earningsTable').DataTable({
		                responsive: true
		        });
			} );
	});

	// $('#dataTables-example > tbody  > tr').each(function(){
		
	// 	var carObjectId = this.cells[1].id;
	// 	var td_model = this.cells[1];
	// 	var td_car = this.cells[2];

	// 	var userObjectId = this.cells[3].id;
	// 	var td_owner = this.cells[3];

	// 	cars.get(carObjectId, {
	// 		success: function(car)
	// 		{
	// 			var model = car.get("model");
	// 			var license = car.get("license");
	// 			td_model.innerText = model;
	// 			td_car.innerText = license;
	// 		},
	// 		error: function(object, error) 
	// 		{
	// 			alert(error);
	// 		}
	// 	}); // end cars.get

	// 	users.get(userObjectId, {
	// 		success: function(user)
	// 		{
	// 			var firstName = user.get("firstName");
	// 			var lastName = user.get("lastName");

	// 			td_owner.innerText = firstName + ' ' + lastName;
	// 		},
	// 		error: function(object, error) 
	// 		{
	// 			alert(error);
	// 		}

	// 	});//end users.get

	// }); // end each function



});
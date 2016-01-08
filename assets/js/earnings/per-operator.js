$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");
	var _User = Parse.Object.extend("_User");
	var _Car = Parse.Object.extend("Car");
	var _Pkg = Parse.Object.extend("CarWashPackages");

	var users = new Parse.Query(_User);
	var cars = new Parse.Query(_Car);
	var pkg = new Parse.Query(_Pkg);

	var operatorId = $("#operatorId").html();

	users.get(operatorId,{
		success: function(user)
		{
			var firstName = user.get("firstName");
			var lastName = user.get("lastName");

			$("#operatorId").html("Operator: "+firstName + ' ' + lastName);
		},
		error: function(object, error) 
		{
			alert(error);
		}

	});
	// alert(operatorId);

	$('#dataTables-example > tbody  > tr').each(function(){
		
		var carObjectId = this.cells[2].id;
		var td_license = this.cells[3];
		var td_model = this.cells[2];

		var userObjectId = this.cells[4].id;
		var td_owner = this.cells[4];

		var packageObjectId = this.cells[1].id;
		var td_package = this.cells[1];

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

		// users.get(optrObjectId, {
		// 	success: function(optr)
		// 	{
		// 		var firstName = optr.get("firstName");
		// 		var lastName = optr.get("lastName");

		// 		td_optr.innerText = firstName + ' ' + lastName;
		// 	},
		// 	error: function(object, error) 
		// 	{
		// 		alert(error);
		// 	}

		// });//end opt.get

	}); // end each function



});
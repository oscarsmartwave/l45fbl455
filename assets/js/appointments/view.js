$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");
	var _User = Parse.Object.extend("_User");
	var _Car = Parse.Object.extend("Car");

	var users = new Parse.Query(_User);
	var cars = new Parse.Query(_Car);

	$('#dataTables-example > tbody  > tr').each(function(){
		
		var carObjectId = this.cells[1].id;
		var td_model = this.cells[1];
		var td_car = this.cells[2];

		var userObjectId = this.cells[3].id;
		var td_owner = this.cells[3];

		cars.get(carObjectId, {
			success: function(car)
			{
				var model = car.get("model");
				var license = car.get("license");
				td_model.innerText = model;
				td_car.innerText = license;
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

	}); // end each function



});
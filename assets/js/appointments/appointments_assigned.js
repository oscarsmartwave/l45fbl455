$(function(){

	// var i = 0;
	// alert(strOptr);



	// alert(optr);

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");   
	var _User = Parse.Object.extend("_User");
	var CarWashPackages = Parse.Object.extend("CarWashPackages");
	var Car = Parse.Object.extend("Car");

	var query = new Parse.Query(_User);
	var queryPkg = new Parse.Query(CarWashPackages);
	var queryCar = new Parse.Query(Car);

	var numRows = document.getElementById("dataTables-example").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;

	// for(var x = 0; x <= numRows; x++)
	// {
		
	// 	var optrNum = "optr"+x;
	var optr = document.getElementById("ImuhOR29hi").innerText;
	var pkg = document.getElementById("to3PqeavUJ").innerText;
	var car = document.getElementById("o5hH2GRb98").innerText;
	var user = document.getElementById("IvjhY3I1Ia").innerText;

	for(var i = 0; i <= numRows; i++)
	{
		//get user
		query.get(optr, {
			success: function(username) 
			{
				var username = username.get("username");
				document.getElementById(optr).innerText = username;
			},
			error: function(object, error) {

			}
		});

		// get car wash package
		queryPkg.get(pkg, {
			success: function(packages)
			{
				var carWashPackage = packages.get("title");
				document.getElementById(pkg).innerText = carWashPackage;
			},
			error: function(object, error) {
			//null
		}
	});

//get car make and model
queryCar.get(car, {
	success: function(carr)
	{
		var _car = carr.get("make")+" "+carr.get("model");
		document.getElementById(car).innerText = _car;
	},
	error: function(object, error) {
			//null
		}
	});
//get user
query.get(user, {
	success: function(username) 
	{
		var username = username.get("username");
		document.getElementById(user).innerText = username;
	},
	error: function(object, error) {

	}
});
}
// }

});
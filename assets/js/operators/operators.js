$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");
	var _User = Parse.Object.extend("_User");
	var _UserData = Parse.Object.extend("UserData");

	var userDataQuery = new Parse.Query(_UserData);
	var userQuery = new Parse.Query(_User);
	var status;

	$('#dataTables-example > tbody  > tr').each(function(){
		
		// var userPointer = 

		userDataQuery.equalTo('user', { __type: 'Pointer',className: '_User',objectId: this.cells[6].id });	
		userDataQuery.find(
		{
			success: function(userData)
			{
				if(userData.length > 0) 
				{
					console.log(userData[0].get("user").id);
					if(userData[0].get("isOnline") == true)
					{
						$("#"+userData[0].get("user").id).html("Online");
					}
					else
					{
						$("#"+userData[0].get("user").id).html("Offline");
					}
				} // find success if
				else
				{
					
				} // find success else
			}, // find success
			error: function(object, error)
			{

			} // error
		}); // find

		console.log(this.cells[6].id);
	}); // end each

});

// 		userDataQuery.equalTo('user', userPointer);	
// 		userDataQuery.find({
// 			success: function(userData){
// 				if(userData.length > 0) {
// 					console.log(userData[0].get("isOnline"));
// 				} // success if
// 			}, // find success
// 			error: function(object, error)
// 			{
// 				console.log(this.cells[6]);
// 			} // error
// 		}); // find

// 		console.log(userPointer);
// // 
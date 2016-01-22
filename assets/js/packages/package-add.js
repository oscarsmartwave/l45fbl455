$(function(){

	var url = "http://localhost/leafblast/";
	// var url = "http://52.24.133.167/leafblast/packages/";
	// Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");

	// $("#createNew").click(function(event){
	// 	event.preventDefault();

	// 	var _Package = Parse.Object.extend("CarWashPackages");
	// 	var pkg = new _Package();

	// 	var title = $("#title").val();
	// 	var priceNum = Number($("#priceNum").val());
	// 	var estTime = Number($("#estTime").val());
	// 	var detail = $("#details").val();

	// 	pkg.set("title", title);
	// 	pkg.set("priceNum", priceNum);
	// 	pkg.set("price", "$"+priceNum);
	// 	pkg.set("detail", detail);
	// 	pkg.set("estTime", estTime);
	// 	pkg.set("isRemoved", false);

	// 	pkg.save(null, {
	// 		success: function(user) {
	// 			alert('Successfully created Car Wash Package. \nobjectId: ' + pkg.id);
	// 			location.reload();
	// 		},
	// 		error: function(user, error) {
	// 			alert('Failed to create Car Wash Package! \nError: ' + error.message);
	// 			location.reload();
	// 		}
	// 	});

	// });
	$(window).load(function(){

		if($("#package").length) {
		
			$("#packagesTable").DataTable({
				responsive: true
			});

		}

	});
	
	// ADD PACKAGE
	$("#createNew").click(function(event){

		$("#createNew").prop("disabled", true);
		console.log("package");
		$.post(
			url+"packages/add",
			{
				title: $("#title").val(),
				priceNum: $("#priceNum").val(),
				estTime: $("#estTime").val(),
				details: $("#details").val()
			},
			function(response)
			{

			}, 'JSON'

		)
		.done(function(data){
			$("<div title='Package'>Package Added</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});

			$("#createNew").prop("disabled", false);

		})
		.fail(function(error, status){

			$("#createNew").prop("disabled", false);
			
			$("<div title='Package'>Adding Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});

		});

	}); // createnew

	$("#btnEditPackage").click(function(event){
		$("#btnEditPackage").prop("disabled", true);
		console.log("btnEditPackage clicked");
		var packageObjectId = $("#objectId").val();
		
		$.post(
			url+"packages/edit/"+packageObjectId,
			{
				objectId: packageObjectId,
				title: $("#title").val(),
				estTime: $("#estTime").val(),
				detail: $("#details").val()
			},
			function(response)
			{

			}, 'JSON'

		)
		.done(function(data){
			$("<div title='Package'>Package Renamed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});

			$("#btnEditPackage").prop("disabled", false);

		})
		.fail(function(error, status){

			$("#btnEditPackage").prop("disabled", false);
			console.log(error);
			$("<div title='Package'>Edit Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});

		});
	}); // tbtneditpackage clicked

	$("#btnDeletePackage").click(function(event){
		$("#btnDeletePackage").prop("disabled", true);
		console.log("btnDeletePackage clicked");
		var packageObjectId = $("#objectId").val();
		
		$.post(
			url+"packages/delete/"+packageObjectId,
			{
				objectId: packageObjectId,
			},
			function(response)
			{

			}, 'JSON'

		)
		.done(function(data){
			console.log(data);
			$("<div title='Package'>Package Deleted</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				window.location.replace(url+"packages");
    			}
			});
		})
		.fail(function(error, status){
			console.log(error);
			$("<div title='Package'>Delete Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				
    			}
			});

			$("#btnDeletePackage").prop("disabled", false);

		});
	});

});
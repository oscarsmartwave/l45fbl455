$(function(){

	var http = location.protocol;
	var slashes = http.concat("//");
	var host = slashes.concat(window.location.hostname);
	var url = host+"/leafblast/packages/"
	
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
			url+"add",
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
			url+"edit/"+packageObjectId,
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
			url+"delete/"+packageObjectId,
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

	//reprice package
	$("#btnRepricePackage").click(function(event){
		$("#btnRepricePackage").prop("disabled", true);
		console.log("btnRepricePackage clicked");
		var packageObjectId = $("#objectId").val();
		$.post(
			url+"price/"+packageObjectId,
			{
				objectId: packageObjectId,
				title: $("#title").val(),
				priceNum: $("#priceNum").val(),
				estTime: $("#estTime").val(),
				detail: $("#detail").val()
			}, 
			function(response)
			{

			},'JSON'
		)
		.done(function(data)
		{
			$("<div title='Package'>Package Repriced</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				// window.location.replace(url+"packages/");
    			}
			});
			console.log(data.objectId);
			$("#objectId").val(data.objectId);
			$("#btnRepricePackage").prop("disabled", false);

		})
		.fail(function(error)
		{
			$("<div title='Package'>Reprice Failed</div>").dialog({
				modal: true,
				open: function(){
					
				},
    			close: function(){ 
    				// window.location.replace(url+"packages");
    			}
			});
			console.log(error);
			$("#btnRepricePackage").prop("disabled", false);
		});

	}); // reprice carwash packages

});
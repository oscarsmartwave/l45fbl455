$(function(){

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");

	$("#createNew").click(function(event){
		event.preventDefault();

		var _Package = Parse.Object.extend("CarWashPackages");
		var pkg = new _Package();

		var title = $("#title").val();
		var priceNum = Number($("#priceNum").val());
		var estTime = Number($("#estTime").val());
		var detail = $("#details").val();

		pkg.set("title", title);
		pkg.set("priceNum", priceNum);
		pkg.set("price", "$"+priceNum);
		pkg.set("detail", detail);
		pkg.set("estTime", estTime);
		pkg.set("isRemoved", false);

		pkg.save(null, {
			success: function(user) {
				alert('Successfully created Car Wash Package. \nobjectId: ' + pkg.id);
				location.reload();
			},
			error: function(user, error) {
				alert('Failed to create Car Wash Package! \nError: ' + error.message);
				location.reload();
			}
		});

	});

});
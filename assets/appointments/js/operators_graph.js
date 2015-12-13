
console.log("document ready");

var opLabel;
var opData;
var opTicks;

$.getJSON('http://localhost/lb_cms/index.php/appointments/graph', function(data) {
	console.log(data.data);	

	opData = data.data;
	opTicks = data.ticks;

})
	.done(function()
	{
		var ticks2 = [[1,'Bob'],[2,'Chris'],[3,'Joe']];
		var data = [
        {
            data: opData,
            color: '#409628',
            label:'Operators',
            lines: {show: true}
        }    
	];

	var options = {
	    xaxis: {
	    	ticks : opTicks,
	    	axisLabel : "Operators"
	    	 },
	    yaxis: {
	    	axisLabel : "Count of Appointments"
	    }
	};
	
	$.plot($("#operator-graph"), data, options);


	});
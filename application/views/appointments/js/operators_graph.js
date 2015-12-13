$(document).ready(function() {
    console.log("document ready");

	

    var opLabel;
    var opData;
    var opTicks;
    $.getJSON('http://localhost/lb_cms/index.php/appointments/graph', function(data) {
    	
    	//console.log(data);
    	
    	opData = JSON.parse(data.data);
    	opTicks = JSON.parse(data.ticks);

    })
    	.done(function()
    	{
    		var income = [[0,3],[1,0],[2,3],[3,1],[4,2],[5,2],[6,2],[7,8],[8,0],[9,9],[10,9],[11,8]];
 
			var data2 = [[0,-1],[1,0],[2,3],[3,5],[4,5],[5,1],[6,3],[7,8],[8,10],[9,9],[10,9],[11,2]];

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
		    	ticks: opTicks	
		    	 }
		};
    	
    	$.plot($("#operator-graph"), data, options);

	
    	});

    
    
});
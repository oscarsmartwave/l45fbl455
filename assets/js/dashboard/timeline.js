$(function(){

	console.log("Ready!");
	var url = "http://localhost/api.leafblast/api/v1/timeline"; // localhost ni oscar
	var ulCount;
	// var url = "http://52.24.133.167/api.leafblast/api/v1/timeline"; // staging server
	var timelineIntervalId = 0;
	

	function timeline()
	{
		$.get(url)
		.done(function(data){
			var timeline = $('#lb-timeline');
			ulCount = $('#lb-timeline li').length;
			
			
			if(ulCount > 10)
			{
				clearInterval(timelineIntervalId);
				return;
			}

			if( $ ('#'+data.Data.Id ).length )
			{
				clearInterval(timelineIntervalId);
				return;
			}

			if((ulCount % 2) == 0)
			{
				var li = $('<li class="timeline-inverted" id="'+data.Data.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i> Sometime Ago</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');
				var prepend = timeline.prepend(li)
				prepend.hide();
				prepend.show("slow");
			}
			else
			{
				var li = $('<li class="timeline" id="'+data.Data.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i> Sometime Ago</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');

				var prepend = timeline.prepend(li)
				prepend.hide();
				prepend.show("slow");
			}

		});
	}
	setInterval(
		function(){
			console.log(ulCount);
			timeline();
		}
		,3000
	);
	

});
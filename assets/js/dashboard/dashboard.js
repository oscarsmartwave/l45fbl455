$(function(){
	/***********************************************************

							TIMELINE CHART

	************************************************************/
	var url = "http://localhost/api.leafblast/api/v1/"; // localhost ni oscar
	var ulCount;
	// var url = "http://52.24.133.167/api.leafblast/api/v1/timeline"; // staging server
	var timelineIntervalId = 0;
	

	

	$.get(url+"timeline/load")
	.done(function(data){
		
		var timeline = $("#lb-timeline");
		$.each(data.Data, function(key, value){
			ulCount = $('#lb-timeline li').length;
			if((ulCount % 2) == 0)
			{
				var li = $('<li class="timeline-inverted" id="'+value.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments '+value.Id+'</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i> '+value.madeAt+'</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');
				var prepend = timeline.append(li)
				prepend.hide();
				prepend.show("slow");
			}
			else
			{
				var li = $('<li class="timeline" id="'+value.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments '+value.Id+'</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i>'+value.madeAt+'</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');

				var prepend = timeline.append(li)
				prepend.hide();
				prepend.show("slow");
			} // else

		}); // each

		// after the page loads call the function with setInterval to load the next orders
		setInterval(
			function() {

				latestOrder();
			}
			,3000
		); // end setInterval
	}) // done
	.fail(function(object, error){
		console.log(error);
	});

	function latestOrder()
	{
		$.get(url+"timeline")
		.done(function(data){
			var timeline = $('#lb-timeline');
			ulCount = $('#lb-timeline li').length;
			console.log(ulCount);
			

			if( $ ('#'+data.Data.Id ).length )
			{
				// clearInterval(timelineIntervalId);
				return;
			}

			if((ulCount % 2) != 0)
			{
				var li = $('<li class="timeline-inverted" id="'+data.Data.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments '+data.Data.Id+'</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i> '+data.Data.madeAt+'</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');
				var prepend = timeline.prepend(li)
				// prepend.hide();
				// prepend.show("slow");
			}
			else
			{
				var li = $('<li class="timeline" id="'+data.Data.Id+'">'+
	            				'<div class="timeline-badge info"><i class="fa fa-check"></i>'+
	            				'</div>'+
	            				'<div class="timeline-panel">'+
	                				'<div class="timeline-heading">'+
					                    '<h4 class="timeline-title">Appointments '+data.Data.Id+'</h4>'+
					                    '<p><small class="text-muted"><i class="fa fa-clock-o"></i> '+data.Data.madeAt+'</small>'+
					                    '</p>'+
					                '</div>'+
					                '<div class="timeline-body">'+
					                    '<p>Some Order</p>'+
					                '</div>'+
					            '</div>'+
					        '</li>');

				var prepend = timeline.prepend(li)
				// prepend.hide();
				// prepend.show("slow");
			}

			if(ulCount > 10)
			{
				$("#lb-timeline li:last-child").remove()
			}

		});
	} // latestOrder

	/************************************************************
	*															*
	*						SIZE CHART							*
	*															*
	************************************************************/
	var sizeData;
	$.get(url+"graphs/size")
        
        .done(function( data ) 
        {
            // alert( "Data Loaded: " + data );
            console.log(data.Data);
            sizeData = data.Data;
            Morris.Bar({
                element: 'size-chart',
                data: sizeData, 
                xkey: 'Size',
                ykeys: ['Count'],
                labels: ['Count'],
                hideHover: 'auto',
                resize: false
            });

        }
    );
	
	/************************************************************
	*															*
	*						TIME CHART							*
	*															*
	************************************************************/

	var timeData;
    $.get(url+"graphs/time")
        
        .done(function( data ) 
        {
            console.log(data.Data);
            timeData = data.Data;
            Morris.Line({
                element: 'time-chart',
                data: timeData,
                xkey: ['hourMade'],
                ykeys: ['count'],
                labels: ['count']
            });

        }
    );

});
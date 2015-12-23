$(function() {

    var timeData;
    var url = "http://52.24.133.167/api.leafblast/api/v1/graphs/time";
    // var url = "http://localhost/api.leafblast/api/v1/graphs/time";
    $.get(url)
        
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
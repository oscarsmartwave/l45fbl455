$(function() {

    var sizeData;
    // var url = "http://52.24.133.167/api.leafblast/api/v1/graphs";
    var url = "http://localhost/api.leafblast/api/v1/graphs";
    $.get(url)
        
        .done(function( data ) 
        {
            // alert( "Data Loaded: " + data );
            console.log(data.Data);
            sizeData = data.Data;
            Morris.Bar({
                element: 'size-chart',
                data: sizeData, 
                // [{
                //     y: '2006',
                //     a: 100,
                //     b: 90
                // }, {
                //     y: '2007',
                //     a: 75,
                //     b: 65
                // }, {
                //     y: '2008',
                //     a: 50,
                //     b: 40
                // }, {
                //     y: '2009',
                //     a: 75,
                //     b: 65
                // }, {
                //     y: '2010',
                //     a: 50,
                //     b: 40
                // }, {
                //     y: '2011',
                //     a: 75,
                //     b: 65
                // }, {
                //     y: '2012',
                //     a: 100,
                //     b: 90
                // }]
                xkey: 'Size',
                ykeys: ['Count'],
                labels: ['Count'],
                hideHover: 'auto',
                resize: true
            });

        }
    );
    
    

});
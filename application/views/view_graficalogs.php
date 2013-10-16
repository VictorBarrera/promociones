<div id="container" width="100%"></div>
<script type="application/x-javascript" src="assets/js/highcharts/highcharts.js" ></script>
<script>

var options = {
    chart: {
        renderTo: 'container',
        defaultSeriesType: 'column'
    },
    title: {
        text: 'Fruit Consumption'
    },
    xAxis: {
        categories: []
    },
    yAxis: {
        title: {
            text: 'Units'
        }
    },
    series: []
};



	// Load the data from the XML file 
$.get('xml/log_backup.xml', function(xml) {
    
    // Split the lines
    var $xml = $(xml);

    // push categories
    $xml.find('categories item').each(function(i, category) {
        options.xAxis.categories.push($(category).text());
    });

    // push series
    $xml.find('series').each(function(i, series) {

        var seriesOptions = {
            name: $(series).find('name').text(),
            data: []
        };

        // push data points
        $(series).find('data point').each(function(i, point) {
            seriesOptions.data.push(
                parseInt($(point).text())
            );
        });

        // add it to the options
        options.series.push(seriesOptions);
    });


    var chart = new Highcharts.Chart(options);
});


</script>
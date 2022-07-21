$(function () {
    // new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart_sms").getContext("2d"), getChartJs('bar','Sms'));
    new Chart(document.getElementById("bar_chart_voice").getContext("2d"), getChartJs('bar','Voice'));
    new Chart(document.getElementById("bar_chart_wp").getContext("2d"), getChartJs('bar','WhatsApp'));
    // new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
    // new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
});

function getChartJs(type,forsample) {
    var config = null;
    $.ajax({
        url: 'get_data.php',
        type: 'post',
        async: false,
        cache: false,
        data: {type: forsample},
        success: function (dataa) {
            var dt=JSON.parse(dataa)
            console.log(dt[0]);
            config = {

                type: 'bar',
                data: {
                    labels: dt[0],
                    datasets: [{
                        label: forsample,
                        data: dt[1],
                        backgroundColor: 'rgba(0, 188, 212, 0.8)'
                    }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        }
    });

    return config;
}
$(function () {
    getMorris('line', 'line_chart_1','sms');
    getMorris('line', 'line_chart_2','voice');
    getMorris('line', 'line_chart_3','wp');
});


function getMorris(type, element,forsample) {
    if (type === 'line') {
        $.ajax({
            url: 'get_data.php',
            type: 'post',
            async: false,
            cache: false,
            data: {type: forsample},
            success: function (data) {
                Morris.Line({
                    element: element,
                    data: [
                        {'period': '2019 Q01' ,'licensed' : 0},{'period': '2019 Q02' ,'licensed' : 0},{'period': '2019 Q03' ,'licensed' : 0},{'period': '2019 Q04' ,'licensed' : 0},{'period': '2019 Q05' ,'licensed' : 0},{'period': '2019 Q06' ,'licensed' : 0},{'period': '2019 Q07' ,'licensed' : 0},{'period': '2019 Q08' ,'licensed' : 0},{'period': '2019 Q09' ,'licensed' : 0},{'period': '2019 Q10' ,'licensed' : 0},{'period': '2019 Q11' ,'licensed' : 0},{'period': '2019 Q12' ,'licensed' : 0},{'period': '2019 Q13' ,'licensed' : 0},{'period': '2019 Q14' ,'licensed' : 0},{'period': '2019 Q15' ,'licensed' : 0},{'period': '2019 Q16' ,'licensed' : 0},{'period': '2019 Q17' ,'licensed' : 0},{'period': '2019 Q18' ,'licensed' : 15},{'period': '2019 Q19' ,'licensed' : 0},{'period': '2019 Q20' ,'licensed' : 0},{'period': '2019 Q21' ,'licensed' : 0},{'period': '2019 Q22' ,'licensed' : 0},{'period': '2019 Q23' ,'licensed' : 0},{'period': '2019 Q24' ,'licensed' : 0},{'period': '2019 Q25' ,'licensed' : 0},{'period': '2019 Q26' ,'licensed' : 0},{'period': '2019 Q27' ,'licensed' : 0},{'period': '2019 Q28' ,'licensed' : 0},{'period': '2019 Q29' ,'licensed' : 0},{'period': '2019 Q30' ,'licensed' : 0},{'period': '2019 Q31' ,'licensed' : 0},
                        {'period': '2019 Q1' ,'licensed' : 50},
                        {'period': '2019 Q2' ,'licensed' : 50},
                        {'period': '2019 Q3' ,'licensed' : 90},
                        {'period': '2019 Q4' ,'licensed' : 70},
                        {'period': '2019 Q5' ,'licensed' : 50},
                        {'period': '2019 Q06' ,'licensed' : 70},
                        {'period': '2019 Q07' ,'licensed' : 0},
                        {'period': '2019 Q08' ,'licensed' : 100},
                        {'period': '2019 Q09' ,'licensed' : 78},
                        {'period': '2019 Q10' ,'licensed' : 10},
                        {'period': '2019 Q11' ,'licensed' : 40},
                        {'period': '2019 Q12' ,'licensed' : 40},
                        {'period': '2019 Q13' ,'licensed' : 40},
                        {'period': '2019 Q14' ,'licensed' :70},
                        {'period': '2019 Q15' ,'licensed' : 30},
                        {'period': '2019 Q16' ,'licensed' : 20},
                        {'period': '2019 Q17' ,'licensed' : 0},
                        {'period': '2019 Q18' ,'licensed' : 20},
                        {'period': '2019 Q19' ,'licensed' : 70},
                        {'period': '2019 Q20' ,'licensed' : 400},
                        {'period': '2019 Q21' ,'licensed' : 140},
                        {'period': '2019 Q22' ,'licensed' : 40},
                        {'period': '2019 Q23' ,'licensed' :20},
                        {'period': '2019 Q24' ,'licensed' : 40},
                        {'period': '2019 Q25' ,'licensed' : 20},
                        {'period': '2019 Q26' ,'licensed' :40},
                        {'period': '2019 Q27' ,'licensed' : 0},
                        {'period': '2019 Q28' ,'licensed' : 210},
                        {'period': '2019 Q29' ,'licensed' : 200},
                        {'period': '2019 Q30' ,'licensed' : 20},
                        {'period': '2019 Q31' ,'licensed' : 758},

                    ],
                    xkey: 'period',
                    ykeys: ['licensed'],
                    labels: ['Licensed'],
                    lineColors: ['rgb(233, 30, 99)'],
                    lineWidth: 4
                });
            }
        });
    }
}
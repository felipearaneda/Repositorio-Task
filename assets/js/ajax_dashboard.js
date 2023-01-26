//array vacíos para guardar fechas y valores de uf
var fechas = [];
var valorUF = [];

$.get("/solutoriatask/indicadores/fetch",

function(data){
    var res = JSON.parse(data); //parse a JSON de data y se guarda en res
    console.log(res);

    //Loop para acceder a los datos de res.data en i e insertarlos en fechas y valorUF correspondiente
    for (let i = 0; i < res.data.length; i++) { 
        fechas.push(res.data[i].fecha_indicador);
        valorUF.push(res.data[i].valor_indicador);
        };

    const ctx = $("#myChart");
    
    //guardar valores de fechas y valorUF en otras variables para no alterar valores originales
    var horizontal = fechas;
    var vertical = valorUF;

    //ordenar array horizontal para que quede de forma ascendente
    horizontal.sort(function(a,b){
        var first = new Date(a).getTime();
        var second = new Date(b).getTime();
        //si el primero es menor que el segundo entonces queda en un índice más bajo, y si es mayor entonces queda en un índice más alto
        return first < second ? -1 : first > second ? 1 : 0;
    });
    console.log(horizontal);

    //variable que obtendrá el id del input "desde"
    var input = document.getElementById("desde");
    //se le asigna el valor de la posición 0 de la variable "horizontal" para que sea dinámico
    input.setAttribute("min", horizontal[0],); 
    //se le asigna el valor de la posición -1 (slice(-1) retorna el último valor del array) de la variable horizontal para que sea dinámico
    input.setAttribute("max", horizontal.slice(-1)); 

    //variable que obtendrá el id del input "hasta" y se le hará lo mismo que al input "desde"
    var input = document.getElementById("hasta");
    input.setAttribute("min", horizontal[0]); 
    input.setAttribute("max", horizontal.slice(-1)); 

    //convertir fecha a formato más fácil de leer
    var dateChartJS = horizontal.map((day, index) => {
        let horizontal = new Date(day);
        return horizontal.setHours(0, 0, 0, 0);
    })
    //resultado del formato
    console.log(dateChartJS);

    //Chart.js
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dateChartJS, //se incluye el resultado del formato en el eje X
            datasets: [{
                label: ' Información histórica UF',
                data: vertical, //Se incluyen los valores de la UF en el eje Y
                borderWidth: 2,
                fill: true,
                lineTension: 0,
                pointBorderWidth: 2,
                pointHoverBorderWidth: 30
            }]
        },
        options: {
            scales: {
                x: {
                    min: horizontal[0],
                    max: horizontal.slice(-1),
                    type: 'time',
                    time: {
                        unit: 'month'
                    }
                },
                y: {
                    ticks: {
                        beginAtZero: false,
                        autoSkip: true
                    }
                    
                },
            }
        }
    });

    function startDateFilter(date){

        const startDate = new Date(date.value);
        var parseDate =startDate.setHours(0, 0, 0, 0)
        console.log(parseDate);

        myChart.config.options.scales.x.min = parseDate;
        myChart.update();
    }

    function endDateFilter(date){

        const endDate = new Date(date.value);
        var parseDate =endDate.setHours(0, 0, 0, 0)
        console.log(parseDate);

        myChart.config.options.scales.x.max = parseDate;
        myChart.update();
    }

    //función para filtrar los datos 
/*     function filterData(date){

        
        //guardo los datos de fechas en otra variable para no alterar valores originales
        let fechas2 = [...fechas];
        console.log("fechas2", fechas2);
    
        //Obtengo los id de los inputs
        var desde = document.getElementById('desde');
        var hasta = document.getElementById('hasta');
    
        //obtengo los índices de las fechas
        var indexStartDate = fechas2.indexOf(desde.value); 
        var indexEndData = fechas2.indexOf(hasta.value); 
        console.log(indexStartDate);
        console.log(indexEndData);

        //extraigo las fechas indicadas por los inputs que están guardads en las variables indexStartDate e indexEndData
        var filterDate = fechas2.slice(indexStartDate, indexEndData + 1);

        //Actualizar los labels del gráfico según los valores indicados previamente
        myChart.config.data.labels = filterDate;
        myChart.update();
    
        //copia de los valores de valorUF a valorUF2 para no alterar valores originales
        var valorUF2 = [...valorUF];
        var filterValue = valorUF2.slice(indexStartDate, indexEndData + 1);
    
        myChart.config.data.datasets[0].data = filterValue;
    
        myChart.update();
        } */

        //los ID'S de los inputs desde y hasta cuando se aplique el atributo "onchange" se ejecutará la función filterData()
        $("#desde").on('change', function(){
            startDateFilter(this);
        });
        
        $("#hasta").on('change', function(){
            console.log("hola desde input hasta");
            endDateFilter(this);
        });

});





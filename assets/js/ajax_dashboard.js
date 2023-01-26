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
                pointHoverBorderWidth: 30,
                pointLabels: {
                    fontStyle: "white"
                }
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

    //Función que marcará el valor mínimo de fechas que puede trabajar Chart.Js
    function startDateFilter(date){

        //Variable que guardará el valor de la fecha ingresada en el parámetro de la función
        const startDate = new Date(date.value);
        //Variable que guardará el parse de startDate a milisegundos para tener mayor precisión a la hora de calcular las fechas
        var parseDate =startDate.setHours(0, 0, 0, 0)
        console.log(parseDate);

        //se indica el valor mínimo que puede tener el eje x en ChartJs según el valor indicado en el input "desde" que ejecutará la función startDateFilter
        myChart.config.options.scales.x.min = parseDate;
        //Se actualiza la información de ChartJs
        myChart.update();
    }

    //Función que marcará el valor Máximo de fechas que puede trabajar Chart.Js
    function endDateFilter(date){

        //Variable que guardará el valor de la fecha ingresada en el parámetro de la función
        const endDate = new Date(date.value);
        //Variable que guardará el parse de endDate a milisegundos para tener mayor precisión a la hora de calcular las fechas
        var parseDate =endDate.setHours(0, 0, 0, 0)
        console.log(parseDate);

        //se indica el valor máximo que puede tener el eje x en ChartJs según el valor indicado en el input "hasta" que ejecutará la función endDateFilter
        myChart.config.options.scales.x.max = parseDate;
        myChart.update();
    }

        //los ID'S de los inputs desde y hasta que cuando se aplique el atributo "onchange" se ejecutará la función startDateFilter(date) y endDateFilter(date) según corresponda para marcar los límites mínimo y máximo de los inputs
        $("#desde").on('change', function(){
            startDateFilter(this);
        });
        
        $("#hasta").on('change', function(){
            console.log("hola desde input hasta");
            endDateFilter(this);
        });

});





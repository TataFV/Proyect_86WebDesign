
/**
 * La gráfica se carga al cargarse la ventana del navegador
 */
var a = document.getElementById("pestañaGraficas");
window.addEventListener('load', (event) => {
  loadChartData();
});

/*
*Peticion de datos al controller
*/
function loadChartData() {

  //Hace la peticion de datos 
  $.ajax({
    url: '../controller/tasksChartController.php',
    method: 'GET',
    dataType: 'JSON',
    success: function (response) {
      console.log(response);
      initChart(response);
    }
  });

}
/**
* Inicializa la tabla con los datos recibidos"
* @data datos recibidos
* Return {$tasks} -
 */

function initChart(data) {

  var employees = data.employees;
  console.log(employees);
  var tasks = data.tasks;

  var series = [];


  for (var i = 0; i < employees.length; i++) {
    //Array vacío que guardará un Array bidimensional de tareas realizadas y su tipo
    var aux_data = [];

    for (var j = 0; j < tasks.length; j++) {
      //console.log(data[i]);

      var finishDate = new Date(tasks[j].finishDate);
      var startDate = new Date(tasks[j].startDate);

      var x = tasks[j].type;
      var y = [startDate.getTime(), finishDate.getTime()];
      var info = tasks[j].name;

      var task = {
        x: x,
        y: y,
        info: info
      };

      //Guarda las tareas realizadas por un mismo trabajador en el array
      if (tasks[j].id_employee == employees[i].id) {
        aux_data.push(task);
      }

    }

    console.log(employees[i].name);
    var aux_serie = { 'name': employees[i].name, 'data': aux_data };
    series.push(aux_serie);
  }

  //Opciones de estilo de la tabla
  var options = {
    series: series,
    chart: {
      height: 600,
      type: 'rangeBar',
      toolbar: {
        tools: {
          download: false,
        },
        autoSelected: 'pan'
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        barHeight: '50%'
      }
    },
    colors: [
      "#054ada", "#97c1ff", "#c2daff"
    ],
    fill: {
      type: 'solid'
    },
    xaxis: {
      type: 'datetime',
      labels: {
        datetimeUTC: false,
        style: {
          fontSize: '12px'
        }
      }
    },
    yaxis: {
      labels: {
        style: {
          fontSize: '20px'
        }
      }
    },
    legend: {
      position: 'top'
    },
    tooltip: {
      custom: function ({
        series,
        seriesIndex,
        dataPointIndex,
        w
      }) {
        var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
        return (
          '<span class="data-tooltip">' + data.info + '</span>'
        );
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#TaskChart"), options);
  chart.render();
}

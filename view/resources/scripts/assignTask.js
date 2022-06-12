/**
     * Asigna tareas 
     * Return {$tasks} - respuesta con los datos 
     */
function assignTask() {

    //Hace la peticion de datos al Controller
    $.ajax({
        url: '../controller/tasksAssignController.php',
        method: 'GET',
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
        }
    });
}

function task(data) {

    var employees = data.employees;
    console.log(employees);
    var tasks = data.tasks;
    var series = [];
}
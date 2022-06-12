//Devuelve los datos que recibe del Controller
function taskEmployee() {

    $.ajax({
        url: '../controller/taskEmployeeController.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            showTask(response);
        }
    });
}
//Se ejecuta la función al cargar la página
taskEmployee();


/**
* Muestra las tareas 
* @acess private
* @var array
*/
function showTask(response) {

    if (response == null) {
        //Si no hay tareas muestra un mensaje de no hay tareas.
        $('#currentTask').html("Sin tareas");
        // Si hay tareas 
    } else {
        //crea una variable que guarde un boton que cambia de estado
        var currentTaskButton = "<button id='taskStatusChange' data-id='" + response.id + "' data-status='" + response.status + "'>";
        if (response.status == "Por hacer") {
            currentTaskButton = currentTaskButton + "EMPEZAR TAREA</button>";
        } else {
            currentTaskButton = currentTaskButton + "FINALIZAR TAREA</button>";
        }
        //crea un botom con un template html 
        let template = '';
        var priority = "";
        if (response.priority == 1) {
            priority = "priority_low";
        } else if (response.priority == 2) {
            priority = "priority_medium";
        } else {
            priority = "priority_high";
        }
        template += `
             <div class="${priority}">
                <h2>Tarea actual:</h2>
                <h3>Nombre</h3>
                <p>${response.name}</p><br>
                <h3>Descripción</h3>
                <p>${response.description}</p><br>
                <h3>Tipo</h3>
                <p>${response.type}</p><br>
                ${currentTaskButton}
            </div>
        `;

        //Añade un boton al html en el id que se indica
        $('#currentTask').html(template);

        //Selecciona el boton y le añade un event listener. Cuando se haga click en el boton se le añaden los atributos de id y status ese momento.

        var startTaskButton = document.getElementById("taskStatusChange");
        startTaskButton.addEventListener('click', function () {

            var data = {
                "id": $(startTaskButton).attr('data-id'),
                "status": $(startTaskButton).attr('data-status'),
            }
            // Se envia al Controller los datos del boton. 
            // En caso de que el status sea "En curso" se llama a la función asignar tareas. Si no a la función taskEmployee

            $.ajax({
                url: '../controller/taskStatusChangeController.php',
                method: 'POST',
                dataType: 'json',
                data: data,
                success: function (response) {
                    if (data.status == "En curso") {
                        assignTask();
                    }
                    taskEmployee();
                }
            });
        });
    }

}

// Comprueba si hay tarea nuevas cada 5 min
setInterval(taskEmployee, 300000);
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
taskEmployee();


function showTask(response) {

    if (response == null) {

        $('#currentTask').html("Sin tareas");
    } else {

        var currentTaskButton = "<button id='taskStatusChange' data-id='" + response.id + "' data-status='" + response.status + "'>";
        if (response.status == "Por hacer") {
            currentTaskButton = currentTaskButton + "EMPEZAR TAREA</button>";
        } else {
            currentTaskButton = currentTaskButton + "FINALIZAR TAREA</button>";
        }

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

        $('#currentTask').html(template);

        var startTaskButton = document.getElementById("taskStatusChange");
        startTaskButton.addEventListener('click', function () {

            var data = {
                "id": $(startTaskButton).attr('data-id'),
                "status": $(startTaskButton).attr('data-status'),
            }

            $.ajax({
                url: '../controller/taskStatusChangeController.php',
                method: 'POST',
                dataType: 'json',
                data: data,
                success: function (response) {
                    taskEmployee();
                }
            });
        });
    }

}


setInterval(taskEmployee, 30000);
//Devuelve los datos que recibe del Controller
function taskEmployee() {

    $.ajax({
        url: '../controller/taskEmployeeController.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);

            var currentTaskButton = "";
            if (response.status == "Por hacer") {
                currentTaskButton = "<button id='startTask'>EMPEZAR TAREA</button>";
            } else {
                currentTaskButton = "<button id='finishTask'>FINALIZAR TAREA</button>";
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
        }
    });
}
taskEmployee();



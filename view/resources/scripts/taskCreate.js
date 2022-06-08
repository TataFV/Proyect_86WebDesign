
// Activa el eventListener. 
$(document).ready(function () {
    var formButton = document.getElementById("taskFormButton");
    formButton.addEventListener('click', () => {
        taskCreate()
    });
});

/**
 * Guarda los valores de cada campo del formulario en las variables y los envía al Controller
 * Return {$true} - si la petición se realiza correctamente 
 */
function taskCreate() {

    var name = document.getElementById("name").value;
    var description = document.getElementById("description").value;
    var type = document.querySelector('input[name="type"]:checked').value;
    var priority = document.querySelector('input[name="priority"]:checked').value;


    $.ajax({
        url: '../controller/taskCreateController.php',
        method: 'POST',
        dataType: 'json',
        data: {
            "name": name,
            "description": description,
            "type": type,
            "priority": priority,
        },
        //Función que comprueba el resultado de la petión y si tiene exito resetea el formulario
        success: function (response) {
            if (response == true) {
                alert("Tarea creada correctamente");
            }
            console.log(response);
            $('form').trigger('reset');
            assignTask();
        }
    });

}

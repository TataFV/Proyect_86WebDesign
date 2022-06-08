//Devuelve los datos que recibe del Controller
function taskEmployee() {

    $.ajax({
        url: '../controller/taskEmployeeController.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {

        }

    });

}
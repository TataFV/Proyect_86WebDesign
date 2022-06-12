

/**
* Crea una tabla con tareas finalizadas que se pueden borrar 
* Return {$tasks} - Todas las tareas encontradas
*/
function refreshTable() {


    $.ajax({
        url: '../controller/tasksListController.php',
        type: 'GET',
        dataType: 'json',
        success: function (tasks) {
            let template = '';
            tasks.forEach(task => {
                template += `
                    <tr>
                        <td class="centeredColumn">${task.id}</td>
                        <td>${task.name}</td>
                        <td>${task.description}</td>
                        <td class="centeredColumn">${task.id_employee}</td>
                        <td>${task.finishDate}</td>
                        <td>
                            <button class="buttonDelete taskDelete" data-task="${task.id}">
                                ELIMINAR
                            </button>
                        </td>
                    <tr>
                  `
            });
            $('#tasks').html(template);
            $(document).on('click', '.taskDelete', function () {
                //console.log(this.dataset.task);
                var id_task = $(this).attr('data-task');

                //Envía al Controller el Id de la tarea que quiere borrar
                $.ajax({
                    url: '../controller/taskDeleteController.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "taskId": id_task,
                    },
                    success: function (response) {
                        console.log(response);
                        refreshTable();
                    }
                })
            });

        }
    });

}

refreshTable();
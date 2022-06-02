

window.addEventListener('load', (event) => {


    $.ajax({
        url: '../controller/tasksListController.php',
        type: 'GET',
        dataType: 'json',
        success: function (tasks) {
            let template = '';
            tasks.forEach(task => {
                template += `
                <tr>
                    <td>${task.id}</td>
                    <td>${task.name}</td>
                    <td>${task.description}</td>
                    <td>${task.id_employee}</td>
                <tr>
            `
            });
            $('#tasks').html(template);

        }
    });
});



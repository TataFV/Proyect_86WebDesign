<?php
    require_once '../model/User.php';
    session_start();
    $user = $_SESSION['user'];
    
    if (is_null($user)) {
        header('Location: login.html');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="resources/css/formStyles.css">
    <link rel="stylesheet" href="resources/css/tasksListStyles.css">
    <link rel="stylesheet" href="resources/css/indexStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="resources/scripts/progressBar.js"></script>
    <script src="resources/scripts/taskCreate.js"></script>


</head>

<body>
    <header>
        <div class="navbar">
            <div class="container flex">
                <div classs="userRole">
                    <span class="fa-solid fa-user-tie fa-4x roleImg"></span>
                    <span class="welcome">Bienvenida
                        <?php echo $user->get_name(); ?>
                    </span>
                </div>
                <div class="nav"><a class="outline" href="logout.php">Cerrar Sesión</a></div>
            </div>
        </div>
        <div id="myProgress">
            <div id="myBar"></div>
        </div>
    </header>
    <nav class="navbar">
        <div>
            <div class="topnav">
                <a href="indexCeoPanel.php">Empleados</a>
                <a href="tasks.php">Tareas</a>
                <a href="charts.php">Gráficas</a>
            </div>
        </div>
    </nav>
    <h1 class="pageTitle">TAREAS</h1>
    <section id="registration-page">
        <form id="task-form">
            <!-- FORM HEADER -->
            <div class="form-header" id="form-header">
                <h1>Crea nueva tarea</h1>
            </div>
            <div id="form-content">
                <!-- FORM BODY -->
                <div class="form-body">
                    <!-- First name & Last name -->
                    <div class="row">
                        <div class="input-group">
                            <label for="name">Nombre de la tarea</label>
                            <input type="text" id="name" name="task_name" placeholder="Nombre de la tarea" required>
                        </div>
                        <div class="input-group">
                            <label for="description">Descripción de la tarea</label>
                            <textarea id="description" required> </textarea>
                        </div>
                    </div>
                    <!-- Tipo de tarea -->
                    <div class="row">
                        <div class="input-group">
                            <label>Tipo de tarea</label>
                            <div class="checkbox-group">
                                <div>
                                    <label for="Testeo">
                                        <input type="radio" id="testing" name="type" value="Testeo" required>
                                        Testeo
                                    </label>
                                </div>

                                <div>
                                    <label for="Back-End">
                                        <input type="radio" id="backEnd" name="type" value="Back-End" required>
                                        Back-End
                                    </label>
                                </div>

                                <div>
                                    <label for="Front-End">
                                        <input type="radio" id="frontEnd" name="type" value="Front-End" required>
                                        Front-End
                                    </label>
                                </div>


                                <div>
                                    <label for="Reuniones">
                                        <input type="radio" id="meetings" name="type" value="Reunión" required>
                                        Reuniones
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group">
                            <label>Prioridad</label>

                            <div class="radio-group">
                                <div>
                                    <label for="alta">
                                        <input type="radio" name="priority" value="3" required>
                                        Alta
                                    </label>
                                </div>

                                <div>
                                    <label for="Media">
                                        <input type="radio" name="priority" value="2" required>
                                        Media
                                    </label>
                                </div>

                                <div>
                                    <label for="Baja">
                                        <input type="radio" name="priority" value="1" required> Baja
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  FORM FOOTER   -->
                <div class="form-footer">
                    <input type="button" id="taskFormButton" value="CREAR TAREA">
                </div>
            </div>
        </form>
    </section>

    <section id="listTask">
        <div class="containerTable">
            <h2>Historial de Tareas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Empleado</th>
                        <th>Fecha de finalización</th>
                    </tr>
                </thead>
                <tbody id="tasks"></tbody>
            </table>
        </div>
    </section>
    <footer></footer>
    <script src="resources/scripts/taskList.js"></script>
    <script src="resources/scripts/assignTask.js"></script>
    <script>
        $("#form-header").click(function () {
            $("#form-content").slideToggle();
        });
    </script>
</body>

</html>
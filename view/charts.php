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
<meta charset="UTF-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas</title>
    <link rel="stylesheet" href="resources/css/indexStyles.css">
    <link rel="stylesheet" href="resources/css/chartstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="resources/scripts/progressBar.js"></script>
    <script src="resources/scripts/charts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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
    <h1 class="pageTitle"> GRÁFICAS</h1>
    <div class="chartBox">
        <div id="TaskChart"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
<html>
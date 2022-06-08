
<?php
    require_once '../model/User.php';
    session_start();
    $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="es">
<head>
    <title>Ceo Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="resources/css/employeeStyles.css">
    <link rel="stylesheet" href="resources/css/formStyles.css">
    <link rel="stylesheet" href="resources/css/indexStyles.css">
    <!-- Pestañas -->
        <script src="resources/scripts/main.js"></script>
</head>
<body>
    <header>
            <div class="navbar">
                <div class="container flex">
                    <div classs="containerRole">
                        <div class="roleImg">hola</div>
                        <h2>Bienvenida <?php echo $user->get_name(); ?></h2>
                    </div>
                    <ul>
                        <li class="nav"><a class="outline" href="">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
            <div id="myProgress">
                <div id="myBar"></div>
            </div>
    </header>
        <nav class="navbar">
            <div>
                <div id="tabs">
                    <ul>
                        <li><a href="indexCeoPanel.php">Empleados</a></li>
                        <li><a href="tasks.html">Tareas</a></li>
                        <li><a href="charts.html">Gráficas</a></li>
                    </ul>
                </div>
            </div>    
        </nav>
            <h1>EMPLEADOS</h1>
            <div class="indexPage">
            <div class="container">
                <div class="card">
                    <h2>Ezzio Auditore</h2>
                    <p>Web Designer</p>
                </div>
                <div class="card">
                    <h2>Ezzio Auditore</h2>
                    <p>Web Designer</p>
                </div>
                <div class="card">
                    <h2>Ezzio Auditore</h2>
                    <p>Web Designer</p>
                </div>
            </div>
        </div>
        <footer class=footer>
            <div id=footerInfo> 
                <h>86 WebDesing</h3> <br>
                <h> @ 2021 - 2022</h3> 

            <div>

        </footer>
</body>

</html>
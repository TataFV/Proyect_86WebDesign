<?php
    require_once '../model/User.php';
    session_start();
    $user = $_SESSION['user'];

    if (is_null($user)) {
        header('Location: login.html');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Employee Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="resources/css/indexStyles.css">
    <link rel="stylesheet" href="resources/css/taskEmployeeStyles.css">
    <script src="resources/scripts/progressBar.js"></script>
    <script src="resources/scripts/taskEmployee.js"></script>

</head>
<body>
    <header>
            <div class="navbar">
                <div class="container flex">
                    <div classs="userRole">
                        <span class="fa-solid fa-user fa-4x roleImg"></span>
                        <span class="welcome">Bienvenido <?php echo $user->get_name(); ?></span>
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
        </div>    
    </nav>
    <div class="indexPage">
        <div class="container" id="currentTask">
        </div>
    </div>
    <footer class=footer>
        <div id=footerInfo> 
            <p>86 WebDesign<span>|</span>&copy; 2021 - 2022</p> 
        <div>

    </footer>
</body>

</html>


<?php
    require_once '../model/User.php';
    session_start();
    $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>jQuery UI Tabs - Content via Ajax</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <style>
        #container {
            padding: 10px 50px;
            margin: 20px;
        }

        #root {
            max-width: 1000px;
            margin: 0 auto;
        }

        .card {
            margin: 3rem;
            background: white;
            box-shadow: 2px 4px 25px rgba(0, 0, 0, .1);
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            transition: all .2s linear;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;

        }

        .card:hover {
            box-shadow: 2px 8px 45px rgba(0, 0, 0, .15);
        }

        @media screen and (max-width: 599px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        @media screen and (min-width: 600px) {
            .container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media screen and (min-width: 900px) {
            .container {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="formstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Pestañas -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs({
                beforeLoad: function (event, ui) {
                    ui.jqXHR.fail(function () {
                        ui.panel.html(
                            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                            "If this wouldn't be a demo.");
                    });
                }
            });
        });
    </script>
        <script>
        window.addEventListener('load', (event) => {
            move();
        });

        var i = 0;
        function move() {
            if (i == 0) {
                i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }
    </script>
</head>
<nav>
<div class="navbar">
        <div class="container flex">
        <h1>Bienvenida <?php echo $user->get_name(); ?><h1>
            </h1>
            <nav>
                <ul>
                    <li class="nav"><a class="outline" href="">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="myProgress">
        <div id="myBar"></div>
    </div>
</nav>
<body>
    <div id="tabs">
        <ul>
            <li><a href="#container">Empleados</a></li>
            <li><a href="ajax/content1.html">Tareas</a></li>
            <li><a href="charts.html">Gráficas</a></li>
        </ul>
        <div id="container">
            <div id="registerForm">
                <form action="" method="POST">
                    <label for="name">Nombre</label>
                    <input type="text" name="username" placeholder="Nombre">
                    <label for="fname">Apellidos</label>
                    <input type="sex" name="password"><br>
                    <input type="button" id="login" value="Crear">
                </form>
            </div>
            <h1>Empleados</h1>
            <div class="container">
                <div class="card">
                    <i class="fas fa-user fa-4x"></i>
                    <h2>Ezzio Auditore</h2>
                    <p>Web Designer</p>
                </div>
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="blue"
                        class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    </svg>
                    <h2>Lara Croft</h2>
                    <p>Web Designer</p>
                </div>
                <div class="card">
                    <h2>CJ</h2>
                    <p>RRHH</p>
                </div>
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="blue"
                        class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    </svg>
                    <h2>Ezzio Auditore</h2>
                    <p>Web Designer</p>
                </div>
            </div>

        </div>
    </div>
    </div>


</body>

</html>
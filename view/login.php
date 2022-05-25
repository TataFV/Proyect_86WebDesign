<DOCTYPE html>
<html lang="es">
    <head>
    <title></title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <body>
        <form action="" method="POST">
            <h2>Iniciar sesión<h2>
            <p>Nombre de usuario: <br>
            <input type="text" name="username" id="username"></p>
            <p>Password: <br>
            <input type="password" name="password" id="password"></p>
            <input type="button" id="login" value="Iniciar sesión">
        </form>
        <script>
            var button = document.getElementById("login")
            button.addEventListener('click', () => {
                signIn()
            });

            /**
            * Inicia sesion
            * 
            * Reliza una petición POST 
            */
            function signIn(){
                var email = document.getElementById("username").value;
                var password = document.getElementById("password").value;

                $.ajax({
                    data:{"username":email, "password":password},
                    url:'../controller/LoginController.php',
                    type:'post',
                    success:function(response){
                        console.log(response);
                    }
                });
            }
        </script>
    </body>
</html>
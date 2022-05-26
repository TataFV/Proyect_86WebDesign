/**
 * button
 * @type {string}
 */
var button = document.getElementById("login")
button.addEventListener('click', () => {
    signIn()
});

/*
* Inicia sesion
*/
function signIn() {

    /**
    * Email introducido por el usuario para logearse
    * @type {string}
    */
    var email = document.getElementById("username").value;

    /**
    * Contraseña introducida por el usuario para logearse 
    * @type {string}
    */
    var password = document.getElementById("password").value;

    //Hace la conexion con base de datos
    $.ajax({
        url: '../controller/LoginController.php',
        method: 'POST',
        dataType: 'json',
        data: {
            "username": email,
            "password": password,
        },
        success: function (response) {
            console.log(response);
            if (!response.error) {
                window.location = response.response;
            } else {
                alert(response.response);
            }
        }
    });
}


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

    //Si el campo username está vacío
    if (email == "") {
        showErrorSpan('#brusername', "Usuario no introducido");

        //Si el campo password está vacío
    } else if (password == "") {
        showErrorSpan('#brpassword', "Contraseña no introducida");
    } else {

        //Hace la peticion al controller
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
                    showErrorSpan('#br' + response.type, response.response);
                }
            }
        });
    }

}

/**
 * Borrar el mensaje de error.Crea un span y muestra en él un mensaje de error 
 * @param {string} errorId id del input
 * @param {string} message Mensaje que tiene que  mostrar
 */
function showErrorSpan(errorId, message) {
    $('#errorUserNameSpan').remove();
    var span = document.createElement('span');
    $(span).last().addClass("selected")
    $(span).css({ 'background-color': '#ff7f50', 'color': 'white', 'font-family': 'Courier', 'font-size': '1em', 'padding': '4px', 'border-radius': '4px', 'box-shadow': '4px 4px #CD5C5C' });
    $(span).attr('id', 'errorUserNameSpan');
    $(errorId).after(span);
    span.innerHTML = message;
}
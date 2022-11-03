function logar()
{
    var email = document.getElementById("email");
    var senha = document.getElementById("senha");

    if(email.value == "professor@email.com" && senha.value == "senhaProf")
    {
        localStorage.setItem("acesso", true);

        window.location.href = "index.html";
    }
    else
        alert("email ou senha errada");
}
function login(){

    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;
    
    if (email === "cliente@gmail.com" && senha === "12345678") {
        alert("Login Realizado com sucesso");
        window.location.href = "home_cliente.php";

    }else if(email === "adm@gmail.com" && senha === "12345678"){
        alert("Login Realizado com sucesso");
        window.location.href = "home_adm.html";
    }    
    
    else{
        alert("Dados de login incorretos!!!")
    }
}
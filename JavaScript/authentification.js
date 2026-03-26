document.addEventListener("DOMContentLoaded", () => {
    const authentificationForm = document.getElementById("authentificationForm");
    const id = document.getElementById("id");
    const mdp = document.getElementById("mdp");
    const btnValider = document.getElementById("btnValider");
    const message = document.getElementById("message");
    
    if (btnValider){
        btnValider.addEventListener("click", (event) => {
             if (id.value.trim() == "") {
                id.focus();
                message.innerHTML = "Veuillez renseigner votre id";
             } else if (mdp.value.trim() == "") {
                mdp.focus();
                message.innerHTML = "Veuillez renseigner votre mot de passe";
             } else {
                message.innerHTML = "";
                authentificationForm.submit();
             }
        });
    }
});

window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    if (params.get("erreur") === "1") {
        document.getElementById("message").innerHTML = "Connexion impossible, id ou mot de passe incorrect.";
    }

    if (params.get("isDeco") === "1") {
        document.getElementById("deconnexion").innerHTML = "Vous êtes déconnecté";
    }
}
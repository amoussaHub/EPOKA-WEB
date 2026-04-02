window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    const user = params.get("user");
    
    //document.getElementById("id").innerHTML = "utilisateur n°" + user + " connecté";
    document.getElementById("user").setAttribute("value", user);

}

document.addEventListener("DOMContentLoaded", () => {
    const deConnexion = document.getElementById("deconnexion");
    const btnValidatioMission = document.getElementById("btnValidatioMission");
    const btnPaiementFrais = document.getElementById("btnPaiementFrais");
    const btnParamètrage = document.getElementById("btnParamètrage");
    const deconnexionForm = document.getElementById("deconnexionForm");
    const gestionNavForm = document.getElementById("gestionNavForm");

    if (deConnexion){
        deConnexion.addEventListener("click", (event) => {
            event.preventDefault();
            deconnexionForm.submit();
        });
    }

    /*if (btnValidatioMission){
        btnValidatioMission.addEventListener("click", (event) => {
            event.preventDefault();
            gestionNavForm.submit();
        });
    }*/

    if (btnPaiementFrais){
        btnPaiementFrais.addEventListener("click", (event) => {
            document.getElementById("page").setAttribute("value", "paiements");
            event.preventDefault();
            gestionNavForm.submit();
        });
    }

    if (btnParamètrage){
        btnParamètrage.addEventListener("click", (event) => {
            document.getElementById("page").setAttribute("value", "paramètrage");
            event.preventDefault();
            gestionNavForm.submit();
        });
    }
});
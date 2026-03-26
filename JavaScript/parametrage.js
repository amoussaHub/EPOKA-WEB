window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    const modifParam = params.get("modifParam");
    
    if (modifParam == 1) {
        document.getElementById("message").className = "alert alert-warning mt-2 mb-4";
        document.getElementById("message").innerHTML = "modification effectué";
    } else if (modifParam == 2) {
        document.getElementById("message").className = "alert alert-success mt-2 mb-4";
        document.getElementById("message").innerHTML = "Ajout d'une nouvelle distance effectué";
    } else if (modifParam == 3) {
        document.getElementById("message").className = "alert alert-danger mt-2 mb-4";
        document.getElementById("message").innerHTML = "la distance saisie existe déjà";
    } 
}
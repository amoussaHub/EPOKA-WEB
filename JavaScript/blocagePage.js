window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    const user = params.get("user");
    
    document.getElementById("user").setAttribute("value", user);
}

document.addEventListener("DOMContentLoaded", () => {
    const btnRetour = document.getElementById("btnRetour");
    const retourHomeForm = document.getElementById("retourHomeForm");

    if (btnRetour){
        btnRetour.addEventListener("click", (event) => {
            //event.preventDefault();
            retourHomeForm.submit();
        });
    }
});
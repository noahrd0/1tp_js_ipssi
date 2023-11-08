let DarkLight = document.getElementById("DarkLight");

DarkLight.addEventListener("click", (e) => {

    if (document.body.style.backgroundColor == 'black') {
        // Si le fond est noir, le changer en blanc
        document.body.classList.remove("dark-mode");

        localStorage.setItem('Lumière', "Blanc");

      } else {
        // Si le fond est blanc, le changer en noir
        document.body.classList.toggle("dark-mode");
        localStorage.setItem('Lumière', "Noir");
      }
})
if(localStorage.getItem('Lumière')=="Noir"){
    document.body.classList.toggle("dark-mode");
}
else{
    document.body.classList.remove("dark-mode");
}


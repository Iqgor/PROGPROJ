const verwijderButton  = document.getElementById("verwijder")
const overlay = document.getElementById("overlay")

let aanOfNiet = false


verwijderButton.onclick = function(){

    if(aanOfNiet === false){
        overlay.style.display = "flex";  
        aanOfNiet = true
        verwijderButton.style.zIndex = "2" 

    }else{
        overlay.style.display = "none";
        verwijderButton.style.zIndex = "1" 
        aanOfNiet = false
    }
}
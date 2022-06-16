/*document.getElementById("reload").addEventListener("click", function (e) {
    e.preventDefault()*/



getRoomNb()


function getRoomNb(){

    const xhr = new XMLHttpRequest()

    //ce que ça fais une fois le reste validé
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //permet a la fonction de s'appeler elle même toutes les X ms
            setTimeout(getRoomNb,1000);

            const data = JSON.parse(this.responseText);

            //on compare le nombre d'équipe actuellement dans une salle avec a sa limite
            //la limite est malheureusement fixé en dur dans le code
            if (data[123] >= 5){
                console.log('amphi')
            }

            if (data[432] >= 5){
                console.log('studio')
            }

        }else if(this.readyState == 4){
            console.log("Une erreur est survenue ...");
        }
    };


    xhr.open("POST", "ateliers/dispatch_room.php", true)
    xhr.send();

    return false
} //)
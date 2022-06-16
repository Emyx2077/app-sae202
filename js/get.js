const pingouin = document.getElementById("pingouin");
const mouette = document.getElementById("mouette");
const oie = document.getElementById("oie");
const pintade = document.getElementById("pintade");
const poule = document.getElementById("poulet");


getRoomNb()

function getRoomNb(){

    const xhr = new XMLHttpRequest()

    //ce que ça fais une fois le reste validé
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //permet a la fonction de s'appeler elle même toutes les X ms
            setTimeout(getRoomNb,2000);

            const data = JSON.parse(this.responseText);

            //log la mouette
            mouette.innerText = data[201]

            //log l'oie'
            oie.innerText = data[009]

            //log le pingouin
            pingouin.innerText = data[205]

            //log la pintade
            pintade.innerText = data[017]

            //log la poule
            poule.innerText = data[007]

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
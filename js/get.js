const pingouin = document.getElementById("pingouin");
const mouette = document.getElementById("mouette");
const oie = document.getElementById("oie");
const pintade = document.getElementById("pintade");
const poule = document.getElementById("poule");


getRoomNb()

function getRoomNb(){

    const xhr = new XMLHttpRequest()

    //ce que ça fais une fois le reste validé
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            //permet a la fonction de s'appeler elle même toutes les X ms
            setTimeout(getRoomNb,2000);

            const data = JSON.parse(this.responseText);

            //log la mouette
            if (data[201] !== undefined){
                mouette.innerText = data[201]
                if (data[201] >= 5) {
                    mouette.closest('a').addEventListener("click", (e) => {
                        e.preventDefault()
                    });
                } else {
                    
                }
            } else {
                mouette.innerText = '0'
            }

            //log l'oie'
            if (data[9] !== undefined){
            oie.innerText = data[9]
            } else {
                oie.innerText = '0'
            }

            //log le pingouin
            if (data[205] !== undefined){
            pingouin.innerText = data[205]
            } else {
                pingouin.innerText = '0'
            }

            //log la pintade
            if (data[17] !== undefined){
            pintade.innerText = data[17]
            } else {
                pintade.innerText = '0'
            }

            //log la poule
            if (data[7] !== undefined){
                poule.innerText = data[7]
            } else {
                poule.innerText = '0'
            }

        }else if(this.readyState === 4){
            console.log("Une erreur est survenue ...");
        }
    };


    xhr.open("POST", "ateliers/dispatch_room.php", true)
    xhr.send();

    return false
} //)